<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PolishMailing extends Mailable {
    use Queueable, SerializesModels;

    public $email;
    public $magic;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $magic) {
        $this->email = $email;
        $this->magic = $magic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->subject('Dziękujemy za udział w CodeWeek2022- weź udział w konkursie 1000 pierwszych organizatorów')->markdown(
            'emails.pl.contest'
        );
    }
}
