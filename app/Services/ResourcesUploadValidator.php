<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class ResourcesUploadValidator
{
    /**
     * Required column names (Excel headers) as normalised by WithHeadingRow.
     * Must match ResourcesImport keys.
     */
    public const REQUIRED_COLUMNS = [
        'name_of_the_resource',
    ];

    /**
     * Validate that parsed rows (from ResourcesPreviewImport) contain required column headers.
     *
     * @param  array<int, array<string, mixed>>  $rows
     * @return array{valid: bool, missing: array<string>}
     */
    public static function validateRequiredColumnsFromRows(array $rows): array
    {
        $firstRow = $rows[0] ?? [];
        $headers = is_array($firstRow) ? array_keys($firstRow) : [];
        $missing = array_values(array_diff(self::REQUIRED_COLUMNS, $headers));

        return [
            'valid' => empty($missing),
            'missing' => $missing,
        ];
    }

    /**
     * Validate that the uploaded file contains required column headers (reads file via HeadingRowImport).
     *
     * @param  string  $path  Path to the stored file (e.g. from Storage)
     * @param  string  $disk  Disk name (e.g. 'local')
     * @return array{valid: bool, missing: array<string>, error?: string}
     */
    public static function validateRequiredColumns(string $path, string $disk = 'local'): array
    {
        try {
            $import = new HeadingRowImport(1);
            $data = Excel::toArray($import, $path, $disk);
        } catch (\Throwable $e) {
            return [
                'valid' => false,
                'missing' => [],
                'error' => $e->getMessage(),
            ];
        }

        $firstRow = $data[0][0] ?? [];
        $headers = is_array($firstRow) ? array_keys($firstRow) : [];
        $missing = array_values(array_diff(self::REQUIRED_COLUMNS, $headers));

        return [
            'valid' => empty($missing),
            'missing' => $missing,
        ];
    }
}
