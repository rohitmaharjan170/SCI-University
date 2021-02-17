<?php

namespace App\Mail;

use App\models\Trainer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TrainerRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $trainer;

    public function __construct(Trainer $trainer)
    {
        $this->trainer = $trainer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Trainer Verification')->view('mail.trainer_registered_mail_template');
    }
}
