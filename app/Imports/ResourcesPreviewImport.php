<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

/**
 * Parses an Excel/CSV file into an array of rows with heading keys (for resources import preview).
 */
class ResourcesPreviewImport implements ToArray, WithHeadingRow
{
    /** @var array<int, array<string, mixed>> */
    public array $data = [];

    public function array(array $array): void
    {
        $this->data = $array;
    }
}
