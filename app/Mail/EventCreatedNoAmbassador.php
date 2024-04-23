<?php

namespace App\Mail;

use App\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventCreatedNoAmbassador extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this
            ->subject('No Ambassador for '.$this->event->country->name.' - A new event on codeweek.eu needs your attention')
            ->markdown('emails.en.event-created-no-ambassador');
    }
}
