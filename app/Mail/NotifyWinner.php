<?php

namespace App\Mail;

use App\Event;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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
    public function __construct ($user, $edition)
    {
        $this->user = $user;
        $this->edition = $edition;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("[CodeWeekEU] You are a winner !")
            ->markdown('emails.en.notify-winner');
    }
}
