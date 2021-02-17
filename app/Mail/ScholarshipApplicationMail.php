<?php

namespace App\Mail;

use App\models\Scholarship;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ScholarshipApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $scholarship;
    public function __construct(Scholarship $scholarship)
    {
        $this->scholarship = $scholarship;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Scholarship Application Received')->view('mail.scholarship_application_success_mail_template');
    }
}
