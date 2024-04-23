<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemindersSummary extends Mailable
{
    use Queueable, SerializesModels;

    public $creatorsCount;

    public $eventsCount;

    public $updated;

    public $mailsQueued;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($creatorsCount, $eventsCount, $updated, $mailsQueued)
    {
        $this->creatorsCount = $creatorsCount;
        $this->eventsCount = $eventsCount;
        $this->updated = $updated;
        $this->mailsQueued = $mailsQueued;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Emails Reminders - Daily Stats')
            ->markdown('emails.en.reminders-summary');
    }
}
