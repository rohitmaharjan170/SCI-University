<?php

namespace App\Http\Controllers\backend\Admin;

use App\Mail\AdminPasswordUpdateMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ChangePasswordController extends Controller
{
    public function index()
    {
        $data['title'] = 'Change Password';
        $data['admin'] = auth('admin')->user();

        return view('backend.admin.admin.change-password', $data);
    }

    public function updatePassword(Request $request)
    {

        $admin = auth('admin')->user();

        $this->validate($request, [
            'old_password'          => 'required',
            'password'              => 'required|min:4',
            'password_confirmation' => 'required|same:password'
        ]);

        if (Hash::check($request->old_password, $admin->password)) {
            $adm = $admin->update([
                'password' => bcrypt($request->password)
            ]);

            if ($adm){
                Mail::to($admin->email)->send(new AdminPasswordUpdateMail($admin, $request->password));
                UpdateMessage('Password');
            }else{
                customErrorMessage('Failed to update password','Failed');
            }

            return back();
        }

        customErrorMessage('Old password did not match!','Failed');
        return back()->withInput($request->all());
    }
}
