<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ItalianMailing extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public $magic;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $magic)
    {
        $this->email = $email;
        $this->magic = $magic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->subject('EU CodeWeek - Invito personale alla festa online del 9 novembre')->markdown(
            'emails.it.italian-mailing'
        );
    }
}
