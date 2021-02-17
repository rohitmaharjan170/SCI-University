<?php

namespace App\Mail;

use App\models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CoursePurchasedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $courseTitle;
    public $price;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($courseTitle, $price)
    {
        $this->courseTitle = $courseTitle;
        $this->price = $price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Course Purchased')->view('mail.course_purchased_mail_template');
    }
}
