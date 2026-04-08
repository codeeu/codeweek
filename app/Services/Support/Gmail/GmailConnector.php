<?php

namespace App\Services\Support\Gmail;

interface GmailConnector
{
    /**
     * @return array{messages: GmailMessage[], next_history_id: ?string}
     */
    public function fetchNewMessages(
        string $mailbox,
        ?string $label,
        string $query,
        ?string $sinceHistoryId,
        int $max = 25,
    ): array;
}

