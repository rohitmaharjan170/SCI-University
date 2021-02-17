<?php

namespace App\Http\Controllers\frontend\auth;

use App\Mail\AdminEmailResetMail;
use App\Mail\UserEmailResetMail;
use App\models\EmailReset;
use App\models\Student;
use App\models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EditProfileController extends Controller
{
    public function index()
    {
        $data['title'] = 'Edit Profile';

        if (auth('student')->check()) {
            $data['user'] = auth('student')->user();
            return view('frontend.student.edit-profile', $data);
        }

        if (auth('trainer')->check()) {
            $data['user'] = auth('trainer')->user();
            return view('frontend.trainer.edit-profile', $data);
        }

    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'profile_image_uploaded'=>'image|mimes:jpg,jpeg'
        ]);

        try {
            $imageFolder='';
            if (auth('student')->check()) {
                $user = auth('student')->user();
                $user->name = $request->name;
                $imageFolder='student';
            }
            if (auth('trainer')->check()) {
                $fullName = explode(' ', $request->name);
                $firstName = $fullName[0];
                $lastName = '';
                for ($i = 1; $i < count($fullName); $i++)
                    $lastName = $lastName . $fullName[$i] . ' ';

                $user = auth('trainer')->user();
                $user->first_name = $firstName;
                $user->last_name = $lastName;
                $imageFolder='trainer';
            }

            if($request->hasFile('profile_image_uploaded')){
                removeSingleOldImage($user->profile_image,$imageFolder);
                $fileUploaded=uploadSingleImage($request->file('profile_image_uploaded'),$imageFolder,50);
                $user->profile_image=$fileUploaded;
            }

            $user->update();

            //generate email reset token for that user
            if ($user->email !== $request->email) {
                //generate email reset token and email
                $resetEmail = EmailReset::create([
                    'user_id' => $user->id,
                    'new_email' => $request->email,
                    'token' => Str::random(40)
                ]);

                //send email reset email link
                Mail::to($user->email)->send(new UserEmailResetMail($resetEmail));
                customSuccessMessage('Please check your email to update your new email!', 'Check Email');
            }
            UpdateMessage('Profile');
            return back();
        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(), 'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'token' => 'required',
        ]);

        $emailValidate = EmailReset::where('user_id', $request->user_id)->where('token', $request->token)->first();

        if ($emailValidate) {
            if (auth('student')->check()) {
                $profile = 'student/profile';
                Student::findOrFail($request->user_id)->update([
                    'email' => $emailValidate->new_email
                ]);

            }

            if (auth('trainer')->check()) {
                $profile = 'trainer/profile';
                Trainer::findOrFail($request->user_id)->update([
                    'email' => $emailValidate->new_email
                ]);


            }
            //remove from the email validation checking table
            $emailValidate->delete();

            customSuccessMessage('Email has been updated successfully!', 'Success');
            return redirect($profile);
        }
        customErrorMessage('Failed to validate email!', 'Failed');
        return redirect('/login');
    }
}
