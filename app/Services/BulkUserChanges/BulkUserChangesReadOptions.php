<?php

namespace App\Services\BulkUserChanges;

final class BulkUserChangesReadOptions
{
    public function __construct(
        public readonly ?int $ignoreThroughRow = null,
    ) {
    }

    public static function fromInput(mixed $value): self
    {
        if ($value === null || $value === '') {
            return new self;
        }

        $row = (int) $value;

        return new self(
            ignoreThroughRow: $row > 0 ? $row : null,
        );
    }

    public function shouldIgnoreRow(int $rowNumber): bool
    {
        return $this->ignoreThroughRow !== null && $rowNumber <= $this->ignoreThroughRow;
    }
}
