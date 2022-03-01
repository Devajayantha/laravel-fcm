<?php

namespace App\Listeners;

use App\Mail\OtpMail;
use App\Events\OtpEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OtpListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OtpEvent  $event
     * @return void
     */
    public function handle(OtpEvent $event)
    {
       return Mail::to($event->otp->email)
                    ->send(new OtpMail($event->otp));
    }
}
