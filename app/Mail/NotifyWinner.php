<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyWinner extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $edition;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $edition)
    {
        $this->user = $user;
        $this->edition = $edition;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this
            ->subject('[EU Code Week] You are a winner !')
            ->markdown('emails.en.notify-winner');
    }
}
