<?php

namespace App\Services\Support\Gmail;

class GmailMessage
{
    public function __construct(
        public string $id,
        public ?string $threadId,
        public ?string $subject,
        public ?string $from,
        public string $rawBody,
        public ?string $internalDateMs = null,
    ) {
    }
}

