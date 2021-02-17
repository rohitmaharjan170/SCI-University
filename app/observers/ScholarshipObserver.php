<?php

namespace App\Observers;

use App\Mail\AdmissionApplicationMail;
use App\Mail\ScholarshipApplicationMail;
use App\models\Scholarship;
use Illuminate\Support\Facades\Mail;

class ScholarshipObserver
{
    public function creating(Scholarship $scholarship)
    {
        Mail::to($scholarship->email)->send(new ScholarshipApplicationMail($scholarship));
    }
}