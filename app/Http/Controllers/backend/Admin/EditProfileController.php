<?php

namespace App\Http\Controllers\backend\Admin;


use App\Mail\AdminEmailResetMail;
use App\models\Admin;
use App\models\EmailReset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EditProfileController extends Controller
{
    public function index()
    {
        $data['title'] = 'Edit Profile';
        $data['admin'] = auth('admin')->user();

        return view('backend.admin.admin.edit-profile', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $admin = Admin::find(auth('admin')->user()->id);
        $admin->name = $request->name;
        $admin->update();
        UpdateMessage('Profile');
        if ($admin->email !== request()->email) {
            //generate email reset token and email
            $resetEmail = EmailReset::create([
                'user_id' => $admin->id,
                'new_email' => $request->email,
                'token' => Str::random(40)
            ]);

            //send email reset email link
            Mail::to($admin->email)->send(new AdminEmailResetMail($resetEmail));
            customSuccessMessage('Please check your email to update your new email!', 'Check Email');
        }

        return back();
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'token' => 'required',
        ]);
        
        $emailValidate = EmailReset::where('user_id',$request->user_id)->where('token',$request->token)->first();

        if ($emailValidate){
            Admin::findOrFail($request->user_id)->update([
                'email' => $emailValidate->new_email
            ]);

            //remove from the email validation checking table
            $emailValidate->delete();

            customSuccessMessage('Email has been updated successfully!','Success');
            return redirect('/admin/profile');
        }
        customErrorMessage('Failed to validate email!','Failed');
        return redirect('/admin/profile');
    }
}
