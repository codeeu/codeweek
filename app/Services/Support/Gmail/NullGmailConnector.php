<?php

namespace App\Services\Support\Gmail;

class NullGmailConnector implements GmailConnector
{
    public function fetchNewMessages(
        string $mailbox,
        ?string $label,
        string $query,
        ?string $sinceHistoryId,
        int $max = 25,
    ): array {
        return [
            'messages' => [],
            'next_history_id' => $sinceHistoryId,
        ];
    }
}

