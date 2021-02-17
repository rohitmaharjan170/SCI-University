<?php

namespace App\Observers;

use App\Mail\AdmissionApplicationMail;
use App\Mail\AdmissionPasswordUpdateMail;
use App\Mail\AdmissionRegisteredMail;
use App\Mail\AdmissionRegisterMail;
use App\models\Admission;
use Illuminate\Support\Facades\Mail;

class AdmissionObserver
{
    public function creating(Admission $admission)
    {
        Mail::to($admission->email)->send(new AdmissionApplicationMail($admission));
    }
}