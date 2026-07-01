<?php

namespace App\Services\BulkUserChanges;

final class BulkUserChangesResult
{
    /** @var list<array<string, mixed>> */
    public array $rows = [];

    /** @var array<string, int> */
    public array $summary = [];

    public function addRow(array $row): void
    {
        $this->rows[] = $row;
        $bucket = (string) ($row['bucket'] ?? 'other');
        $this->summary[$bucket] = ($this->summary[$bucket] ?? 0) + 1;
    }
}
