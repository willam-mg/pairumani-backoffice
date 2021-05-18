<?php

namespace App\Listeners;

use App\Mail\PasswordCode;
use App\Events\RecoverPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPasswordCode
{
    /**
     * Handle the event.
     *
     * @param  RecoverPassword  $event
     * @return void
     */
    public function handle(RecoverPassword $event)
    {
        Mail::to($event->cliente->email)->queue(
            new PasswordCode($event->cliente,$event->code)
        );
    }
}
