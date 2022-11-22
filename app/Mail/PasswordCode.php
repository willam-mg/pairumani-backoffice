<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordCode extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cliente,$code)
    {
        $this->cliente = $cliente;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.password-code');
    }
}
