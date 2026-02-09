<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifySuperOrganiser extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $edition;

    /** @var string|null When set, the email button links directly to this certificate PDF URL */
    public $certificateUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $edition, ?string $certificateUrl = null)
    {
        $this->user = $user;
        $this->edition = $edition;
        $this->certificateUrl = $certificateUrl;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this
            ->subject('[EU Code Week] You are a winner !')
            ->markdown('emails.en.notify-super-organiser');
    }
}
