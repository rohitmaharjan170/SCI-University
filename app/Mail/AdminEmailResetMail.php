<?php

namespace App\Mail;

use App\models\EmailReset;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminEmailResetMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $resetEmail;
    public function __construct(EmailReset $resetEmail)
    {
        $this->resetEmail = $resetEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Update Email - Verify you email')->view('mail.admin_email_reset_mail_template');
    }
}
