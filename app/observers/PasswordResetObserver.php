<?php

namespace App\Observers;

use App\Mail\PasswordResetMail;
use App\Mail\StudentRegisterMail;
use App\Mail\TrainerPasswordUpdateMail;
use App\Mail\TrainerRegisteredMail;
use App\models\PasswordReset;
use App\models\Student;
use App\models\Trainer;
use Illuminate\Support\Facades\Mail;

class PasswordResetObserver
{

    public function creating(PasswordReset $passwordReset)
    {
        $email = $passwordReset->email;
        $token = $passwordReset->token;
        $userType = request()->login_as;
        Mail::to($email)->send(new PasswordResetMail($email,$token,$userType));
    }

    /**
     * Listen to the User deleting event.
     *
     * @param \App\User $user
     * @return void
     */

    public function updating(PasswordReset $passwordReset)
    {
        if ($passwordReset->isDirty('password')) {
            // email has changed
            $new_token = $passwordReset->token;
//            $old_password = $student->getOriginal('password');
//            Mail::to($passwordReset->email)->send(new TrainerPasswordUpdateMail($student,$new_password));
        }
    }

}