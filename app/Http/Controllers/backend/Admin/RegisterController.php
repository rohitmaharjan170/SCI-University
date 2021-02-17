<?php

namespace App\Http\Controllers\backend\Admin;

use App\models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:members|max:255',
            'password' => 'required|confirmed|max:255'
        ]);

        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate)->withInput($request->only('first_name', 'last_name', 'email'));
        }

        $admin = Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'verify_token' => Str::random(40)
        ]);

        //send verification mail to member
//        Mail::to($request->email)->send(new UserVerificationMail($member));

        customSuccessMessage('Member Registered Successfully Please check your email to confirm your account.', 'Success');

        return redirect('/admin/login');
    }
}
