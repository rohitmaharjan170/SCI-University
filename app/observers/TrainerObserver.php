<?php

namespace App\Observers;

use App\Mail\TrainerPasswordUpdateMail;
use App\Mail\TrainerRegisteredMail;
use App\models\Trainer;
use Illuminate\Support\Facades\Mail;

class TrainerObserver
{

    public function creating(Trainer $trainer)
    {
        Mail::to($trainer->email)->send(new TrainerRegisteredMail($trainer));
    }

    /**
     * Listen to the User deleting event.
     *
     * @param \App\User $user
     * @return void
     */

    public function updating(Trainer $trainer)
    {
        if ($trainer->isDirty('password')) {
            // email has changed
            $new_password = $trainer->password;
//            $old_password = $trainer->getOriginal('password');
            Mail::to($trainer->email)->send(new TrainerPasswordUpdateMail($trainer,$new_password));
        }
    }

    public function deleting(Trainer $trainer)
    {

    }
}