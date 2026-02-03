<?php

namespace App\Services;

use App\ResourceItem;

class ResourcesImportResult
{
    /** @var array<int, string> Row index (1-based) => reason */
    public array $failures = [];

    /** @var array<int, array{id: int, name: string, source: string}> Created resources for report */
    public array $created = [];

    /** @var array<int, array{id: int, name: string, source: string}> Updated resources for report */
    public array $updated = [];

    public function addFailure(int $rowIndex, string $reason): void
    {
        $this->failures[$rowIndex] = $reason;
    }

    public function addCreated(ResourceItem $item): void
    {
        $this->created[] = [
            'id' => $item->id,
            'name' => $item->name,
            'source' => $item->source,
        ];
    }

    public function addUpdated(ResourceItem $item): void
    {
        $this->updated[] = [
            'id' => $item->id,
            'name' => $item->name,
            'source' => $item->source,
        ];
    }
}
