<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeletedUsers extends Mailable
{
    use Queueable, SerializesModels;

    public $deletedUsers;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($deletedUsers)
    {
        $this->deletedUsers = $deletedUsers;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this
            ->subject('Deleted - Weekly Stats')
            ->markdown('emails.en.deleted-users');
    }
}
