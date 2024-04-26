<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyAdministrator extends Mailable
{
    use Queueable, SerializesModels;

    public $notifications_count;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notifications_count)
    {
        $this->notifications_count = $notifications_count;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this
            ->subject($this->notifications_count.' Activities to be added to the Calendar')
            ->markdown('emails.en.notify-administrator');
    }
}
