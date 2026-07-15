<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PendingEmailChangeConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $user,
        public string $confirmUrl,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirm your new CodeWeek login email',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.en.pending-email-change-confirmation',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
