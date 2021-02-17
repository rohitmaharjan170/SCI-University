<?php

namespace App\Mail;

use App\models\Student;
use App\models\Trainer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentPasswordUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Password Update Success')->view('mail.student_updatepassword_mail_template');
    }
}
