<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PendingEmailChangeNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $user,
        public string $newEmail,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'CodeWeek login email change requested',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.en.pending-email-change-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
