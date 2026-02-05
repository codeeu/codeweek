<?php

namespace App\Services;

use App\Event;

class BulkEventImportResult
{
    /** @var array<int, string> Row index (1-based) => reason */
    public array $failures = [];

    /** @var array<int, array{id: int, title: string, url: string}> Created events for report links */
    public array $created = [];

    /** @var array<int, true> Row index (1-based) => valid (for preview) */
    public array $valid = [];

    public function addFailure(int $rowIndex, string $reason): void
    {
        $this->failures[$rowIndex] = $reason;
    }

    public function addValid(int $rowIndex): void
    {
        $this->valid[$rowIndex] = true;
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
