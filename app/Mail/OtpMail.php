<?php

namespace App\Mail;

use App\Models\Otp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Otp $otp)
    {
        $this->otp = $otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("OTP")
                ->from(env('MAIL_FROM', 'no-reply@timedoor.net'), 'PT Timedoor Indonesia')
                ->view('mail.otp');
    }
}
