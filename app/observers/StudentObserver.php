<?php

namespace App\Observers;

use App\Mail\StudentPasswordUpdateMail;
use App\Mail\StudentRegisterMail;
use App\Mail\TrainerPasswordUpdateMail;
use App\Mail\TrainerRegisteredMail;
use App\models\Student;
use App\models\Trainer;
use Illuminate\Support\Facades\Mail;

class StudentObserver
{

    public function creating(Student $student)
    {
        if (request()->password)
            $password = request()->password;
        else
            $password = request()->email . '#' . request()->first_name;

        Mail::to($student->email)->send(new StudentRegisterMail($student,$password));
    }

    /**
     * Listen to the User deleting event.
     *
     * @param \App\User $user
     * @return void
     */

    public function updating(Student $student)
    {
        if ($student->isDirty('password')) {
            // email has changed
//            $new_password = $student->password;
//            $old_password = $student->getOriginal('password');
            Mail::to($student->email)->send(new StudentPasswordUpdateMail($student));
        }
    }

    public function deleting(Student $student)
    {

    }
}