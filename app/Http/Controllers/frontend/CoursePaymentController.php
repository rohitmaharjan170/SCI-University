<?php

namespace App\Http\Controllers\frontend;

use App\Mail\CoursePurchasedMail;
use App\models\Course;
use App\models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\StripeClient;

class CoursePaymentController extends Controller
{
    public function index(Course $course)
    {
        $data['course'] = $course;
        if (auth('trainer')->check()) {
            $data['userInfo'] = auth('trainer')->user();
        }
        if (auth('student')->check()) {
            $data['userInfo'] = auth('student')->user();
        }

        return view('frontend.payment.course', $data);
    }

    public function purchaseCourse(Request $request, Course $course)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'ccnumber' => 'required',
            'ccmonth' => 'required',
            'ccyear' => 'required',
            'cvc' => 'required'
        ]);
        //find the course price

        //purchase code logic here
        //check if the student has already purchased the course
        //if student has not purchased then signup that student
        //purchase the course using old email or new login email
        //store in course_purchase table
        try {
            $firstName = $request->first_name;
            $lastName = $request->last_name;
            $email = $request->email;
            $ccNumber = $request->ccnumber;
            $ccMonth = $request->ccmonth;
            $ccYear = $request->ccyear;
            $cvc = $request->cvv;

            //check if the student exist
            $oldStudent = Student::where('email', $email)->first();

            //if student does not exist then signup the student
            if (!$oldStudent) {
                //signup new student
                $student = Student::create([
                    'name' => $firstName . ' ' . $lastName,
                    'email' => $email,
                    'password' => bcrypt($email . '#' . $firstName),
                    'verify_token' => Str::random(40)
                ]);
                //use new student id
                $studentId = $student->id;
                //flag as new student
                $newStudent = 1;
            } else {
                //use existing old student id
                $studentId = $oldStudent->id;
                //flag as old student
                $newStudent = 0;
            }

            //check if the student has already purchased the course
            if ($newStudent === 1) {
                $studentCourse = DB::table('course_student')->where('student_id', $student->id)->where('course_id',$course->id)->first();
            } else {
                $studentCourse = DB::table('course_student')->where('student_id', $oldStudent->id)->where('course_id',$course->id)->first();
            }
            if ($studentCourse){
                customErrorMessage('You have already purchased the course','Failed to Re-Purchase Course');
                return back();
            }

            //purchase course with stripe
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe = new StripeClient(env('STRIPE_KEY'));
            $token = $stripe->tokens->create([
                'card' => [
                    'number' => $ccNumber,
                    'exp_month' => $ccMonth,
                    'exp_year' => $ccYear,
                    'cvc' => $cvc,
                ],
            ]);

            if (empty($token->id)) {
                customErrorMessage('unable to purchase course', 'Failed');
                return redirect()->back()->withInput($request->all());
            }

            $charge = Charge::create([
                'card' => $token->id,
                'currency' => 'USD',
                'amount' => $course->price * 100,
                'description' => $course->title_en . ' purchased from ' . $email
            ]);

            //check if charge successful
            if (!empty($charge->id)) {
                //store the student course purchase record in pivot table

                if ($newStudent === 1) {
                    $student->courses()->attach([$course->id]);
                    Mail::to($email)->send(new CoursePurchasedMail($course->title_en, $course->price));
                } else {
                    $oldStudent->courses()->attach([$course->id]);
                    Mail::to($email)->send(new CoursePurchasedMail($course->title_en, $course->price));
                }

                customSuccessMessage('Course Purchase Successful!', 'Success');
                return redirect('/login');
            } else {
                customErrorMessage('unable to purchase course', 'Failed');
            }

        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(), 'Error');
            return back()->withInput($request->all());
        }
    }
}
