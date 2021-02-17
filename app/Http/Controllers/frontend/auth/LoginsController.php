<?php

namespace App\Http\Controllers\frontend\auth;

use App\Mail\PasswordResetMail;
use App\Mail\StudentPasswordUpdateMail;
use App\Mail\TrainerPasswordUpdateMail;
use App\models\PasswordReset;
use App\models\Student;
use App\models\Trainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginsController extends Controller
{
    public function index()
    {
        $data['title'] = 'Login';

        if (auth('student')->check())
            return redirect('/student/dashboard');
        if (auth('trainer')->check())
            return redirect('/trainer/dashboard');

        return view('frontend.auth.login', $data);

    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $loginAs = $request->login_as;
        $remember = $request->has('remember') ? true : false;
        $credentials = $request->only('email', 'password');

        //check if its student login is valid
        if ($loginAs === 'student') {
            $authenticate = Auth::guard('student')->attempt($credentials, $remember);

            if ($authenticate) {
                customSuccessMessage('Student Logged In Successfully!', 'Login Success');
                return redirect('/student/dashboard');
            } else {
                customErrorMessage('email or password did not match!', 'Login Failed');
                return redirect()->back()->withInput($request->all());
            }
        }
        if ($loginAs === 'teacher') {
            $authenticate = Auth::guard('trainer')->attempt($credentials, $remember);

            if ($authenticate) {
                customSuccessMessage('Trainer Logged In Successfully!', 'Login Success');
                return redirect('/trainer/dashboard');
            } else {
                customErrorMessage('email or password did not match!', 'Login Failed');
                return redirect()->back()->withInput($request->all());
            }
        }

        customErrorMessage('Please choose a login type!', 'Error');
        return back();
    }

    public function logout()
    {
        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
            session()->flush();
        }
        if (Auth::guard('trainer')->check()) {
            Auth::guard('trainer')->logout();
            session()->flush();
        }
        customSuccessMessage('Logout Successfull!', 'Success');

        return redirect()->route('login');
    }

    public function forgotPasswordPage()
    {
        $data['title'] = 'Title';

        return view('frontend.auth.forgotpassword', $data);
    }

    public function forgotPasswordReset(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'login_as' => 'required'
        ]);

        $user_type = $request->login_as;
        $email = $request->email;

        if ($user_type === 'student') {
            //check if the email exist and token matches
            $student = Student::where('email', $email)->first();

            //if student exist then reset password
            if ($student) {
                //check if password reset is already made then update token
                $passwordResetOld = PasswordReset::where('email', $email)->first();
                if ($passwordResetOld) {
                    $passwordResetOld->token = Str::random(40);
                    $passwordResetOld->update();

                    Mail::to($email)->send(new PasswordResetMail($student->email, $passwordResetOld->token, $user_type));
                } else {
                    $passwordReset = new PasswordReset;
                    $passwordReset->email = $email;
                    $passwordReset->token = Str::random(40);
                    $passwordReset->save();
                    Mail::to($email)->send(new PasswordResetMail($student->email, $passwordReset->token, $user_type));
                }

                customSuccessMessage('Password Reset Successfully please check your email!', 'Success');
                return back();
            } else {
                customErrorMessage('Student does not exist!', 'Error');
                return back();
            }
        }
        if ($user_type === 'teacher') {
            //check if the email exist and token matches
            $trainer = Trainer::where('email', $email)->first();

            //if student exist then reset password
            if ($trainer) {
                //check if password reset is already made then update token
                $passwordResetOld = PasswordReset::where('email', $email)->first();
                if ($passwordResetOld) {
                    $passwordResetOld->token = Str::random(40);
                    $passwordResetOld->update();
                    Mail::to($email)->send(new PasswordResetMail($trainer->email, $passwordResetOld->token, $user_type));
                } else {
                    $passwordReset = new PasswordReset;
                    $passwordReset->email = $email;
                    $passwordReset->token = Str::random(40);
                    $passwordReset->save();
                    Mail::to($email)->send(new PasswordResetMail($trainer->email, $passwordResetOld->token, $user_type));
                }

                customSuccessMessage('Password Reset Successfully please check your email!', 'Success');
                return back();
            } else {
                customErrorMessage('Trainer does not exist!', 'Error');
                return back();
            }
        }

        customErrorMessage('please select a valid user type!', 'Error');
        return back();
    }

    public function resetPasswordForm(Request $request)
    {
        $data['title'] = 'Reset Password';
        $data['resetToken'] = $request->reset_token;
        $data['user_type'] = $request->user_type;
        $data['email'] = $request->email;
        return view('frontend.auth.resetpasswordform', $data);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|max:255',
            'reset_token' => 'required',
            'user_type' => 'required'
        ]);

        $user_type = $request->user_type;
        $email = $request->email;
        $password = $request->password;
        $token = $request->reset_token;
        //check if the email and token matches for student
        $passwordReset = PasswordReset::where('email', $email)->where('token', $token)->first();
        if ($passwordReset) {
            if ($user_type === 'student') {
                $student = Student::where('email', $email)->first();
                $student->password = bcrypt($password);
                $student->update();
                $passwordReset->delete();

                Mail::to($passwordReset->email)->send(new StudentPasswordUpdateMail($student));
            }
            if ($user_type === 'teacher') {
                $trainer = Trainer::where('email', $email)->first();
                $trainer->password = bcrypt($password);
                $trainer->update();
                $passwordReset->delete();
                Mail::to($passwordReset->email)->send(new TrainerPasswordUpdateMail($trainer));

            }
        } else {
            customErrorMessage('unable to reset password!', 'Failed');
            return back();
        }

        customSuccessMessage('password reset successfully!', 'Success');

        return redirect('/login');
    }
}
