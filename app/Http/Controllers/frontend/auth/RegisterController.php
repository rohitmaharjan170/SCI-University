<?php

namespace App\Http\Controllers\frontend\auth;

use App\Mail\StudentRegisterMail;
use App\models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:students|max:255',
            'password' => 'required|confirmed|max:255'
        ]);
        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate)->withInput($request->only('name', 'email'));
        }
        try {
            DB::beginTransaction();

            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'verify_token' => Str::random(40)
            ]);

            Mail::to($student->email)->send(new StudentRegisterMail($student, $request->password));

            DB::commit();
            customSuccessMessage('Student Registered Successfully Please check your email to confirm your account.', 'Success');

            return redirect('/login');
        } catch (\Exception $exception) {
            customErrorMessage($exception->getMessage(), 'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'verify_token' => 'required'
        ]);

        //check if the email exist and token matches
        $student = Student::where('email', $request->email)->where('verify_token', $request->verify_token)->first();

        //if verify token matches for that email then verify the account
        if ($student) {
            Student::where('email', $request->email)->update([
                'verified' => true,
                'verify_token' => null
            ]);

            customSuccessMessage('Email Verified Successfully!', 'Success');
            return view('frontend.auth.login');
        } else {
            customErrorMessage('Something went wrong!', 'Error');
            return view('frontend.auth.login');
        }

    }
}
