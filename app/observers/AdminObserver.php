<?php

namespace App\Observers;

use App\Mail\AdminPasswordUpdateMail;
use App\Mail\AdminRegisteredMail;
use App\models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminObserver
{

    public function creating(Admin $admin)
    {
        Mail::to($admin->email)->send(new AdminRegisteredMail($admin));
    }

    /**
     * Listen to the User deleting event.
     *
     * @param \App\User $user
     * @return void
     */

    public function updating(Admin $admin)
    {
        if ($admin->isDirty('password')) {
            // password has changed, get the user request password and sent to admin email
            $new_password = request()->get('password');
//            $old_password = $admin->getOriginal('password');

            Mail::to($admin->email)->send(new AdminPasswordUpdateMail($admin, $new_password));
        }
    }

    public function deleting(Admin $admin)
    {

    }
}