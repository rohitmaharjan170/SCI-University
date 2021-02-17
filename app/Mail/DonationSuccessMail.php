<?php

namespace App\Mail;

use App\models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use PDF;

class DonationSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $donation;
    public $pdf;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
        $pdf = PDF::loadView('frontend.donate.certificate', ['donation' => $donation])->setPaper('a4', 'landscape');
        $this->pdf = base64_encode($pdf->stream());
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Donation Successful')->view('mail.donation_successful_mail_template')
            ->attachData(base64_decode($this->pdf), 'certificate.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
