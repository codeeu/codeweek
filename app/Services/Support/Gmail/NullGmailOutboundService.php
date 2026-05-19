<?php

namespace App\Services\Support\Gmail;

class NullGmailOutboundService extends GmailOutboundService
{
    public function __construct()
    {
        // No Google client in tests / when outbound is disabled.
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
        return [
            'id' => 'test-message-id',
            'thread_id' => $threadId ?? 'test-thread-id',
        ];
    }
}
