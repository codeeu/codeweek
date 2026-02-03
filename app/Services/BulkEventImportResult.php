<?php

namespace App\Services;

use App\Event;

class BulkEventImportResult
{
    /** @var array<int, string> Row index (1-based) => reason */
    public array $failures = [];

    /** @var array<int, array{id: int, title: string, url: string}> Created events for report links */
    public array $created = [];

    public function addFailure(int $rowIndex, string $reason): void
    {
        $this->failures[$rowIndex] = $reason;
    }

    public function addCreated(Event $event): void
    {
        $this->created[] = [
            'id' => $event->id,
            'title' => $event->title,
            'url' => url($event->path()),
        ];
    }
}
