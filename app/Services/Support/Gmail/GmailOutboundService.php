<?php

namespace App\Services\Support\Gmail;

use Google\Service\Gmail;
use Google\Service\Gmail\Message as GoogleMessage;

class GmailOutboundService
{
    public function __construct(
        private readonly ?GoogleGmailConnector $connector = null,
    ) {
    }

    /**
     * @return array{id: string, thread_id: ?string}
     */
    public function sendPlainText(
        string $to,
        string $subject,
        string $body,
        ?string $threadId = null,
        ?string $inReplyToMessageId = null,
    ): array {
        if ($this->connector === null) {
            throw new \RuntimeException('Gmail outbound is not configured.');
        }

        return $this->connector->sendPlainTextMessage(
            mailbox: (string) config('support_gmail.user', 'me'),
            to: $to,
            subject: $subject,
            body: $body,
            threadId: $threadId,
            inReplyToMessageId: $inReplyToMessageId,
        );
    }
}
