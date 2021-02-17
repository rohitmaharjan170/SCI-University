<?php

namespace App\Http\Controllers\backend\Admin;

use App\models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (auth('admin')->check())
            return redirect('admin/dashboard');

        return view('backend.admin.admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember') ? true : false;
        $credentials = $request->only('email', 'password');
        $authenticate = Auth::guard('admin')->attempt($credentials, $remember);

        if ($authenticate) {
            customSuccessMessage('Admin Logged In Successfully!', 'Login Success');
            return redirect('/admin/dashboard');
        } else {
            customErrorMessage('email or password did not match!', 'Login Failed');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->flush();
        return redirect()->route('admin.login');
    }

    public function verificationFailedMessage()
    {
        return view('backend.admin.admin.login-error-message')->with('error', 'Account Not Verified, Please Check your email to verify your account');
    }

    public function accountDisabledMessage()
    {
        return view('backend.admin.admin.login-error-message')->with('error', 'Your account is disabled. please contact admin to activate your account');
    }
}
