<?php

namespace App\Services\Support\Gmail;

use App\Services\Support\SupportEmailAddress;

/**
 * Decides which Gmail messages are tickets, approvals, or system noise.
 */
final class SupportGmailIngestFilter
{
    public function isSystemOutbound(GmailMessage $message): bool
    {
        $from = SupportEmailAddress::fromHeader((string) $message->from);
        $notify = SupportEmailAddress::normalize((string) config('support_gmail.notify_email'));

        return $from !== null && $notify !== null && $from === $notify;
    }

    public function isTicketSubject(?string $subject): bool
    {
        $prefix = strtolower(trim((string) config('support_gmail.subject_prefix', '')));
        if ($prefix === '') {
            return false;
        }

        return str_contains(strtolower((string) $subject), $prefix);
    }
}
