<?php

namespace App\Http\Controllers\frontend\auth;

use App\Mail\StudentPasswordUpdateMail;
use App\Mail\TrainerPasswordUpdateMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ChangePasswordController extends Controller
{
    public function index()
    {
        $data['title'] = 'Change Password';

        if (auth('student')->check()) {
            return view('frontend.student.change-password');
        }
        if (auth('trainer')->check()) {
            return view('frontend.trainer.change-password');
        }

    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password'
        ]);

        try {
            if (auth('student')->check())
                $user = auth('student')->user();
            if (auth('trainer')->check())
                $user = auth('trainer')->user();

            if (Hash::check($request->old_password, $user->password)) {
                $usr = $user->update([
                    'password' => bcrypt($request->password)
                ]);
                if (auth('student')->check() && $usr) {
                    Mail::to($user->email)->send(new StudentPasswordUpdateMail($user));
                }

                if (auth('trainer')->check() && $usr){
                    Mail::to($user->email)->send(new TrainerPasswordUpdateMail($user));
                }

                UpdateMessage('Password');
                return back();
            }

            customErrorMessage('Old password did not match!', 'Failed');
            return back()->withInput($request->all());
        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(), 'Error');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }
}
