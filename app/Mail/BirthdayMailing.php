<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BirthdayMailing extends Mailable {
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
        return $this->subject('Celebrate Code Week’s 10th anniversary with us')->markdown(
            'emails.en.birthday-mailing'
        );
    }
}
