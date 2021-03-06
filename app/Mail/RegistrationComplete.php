<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationComplete extends Mailable
{
    use Queueable, SerializesModels;

    public $registerData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($registerData)
    {
        $this->registerData = $registerData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.registration');
    }
}
