<?php

namespace App\Services;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class BulkEventUploadValidator
{
    /**
     * Required column names (Excel headers) as normalised by WithHeadingRow.
     * Must match the guide and GenericEventsImport keys.
     */
    public const REQUIRED_COLUMNS = [
        'activity_title',
        'name_of_organisation',
        'type_of_organisation',
        'activity_type',
        'description',
        'address',
        'country',
        'start_date',
        'end_date',
        'longitude',
        'latitude',
        'contact_email',
        'organiser_website',
        'participants_count',
        'males_count',
        'females_count',
        'other_count',
    ];

    /**
     * Validate that the uploaded file contains all required column headers.
     * Reads the first row (heading row) and checks against REQUIRED_COLUMNS.
     *
     * @param  string  $path  Path to the stored file (e.g. from Storage)
     * @param  string  $disk  Disk name (e.g. 'local')
     * @return array{valid: bool, missing: array<string>, error?: string}  ['valid' => true] or ['valid' => false, 'missing' => ['col1', ...]]
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
        $headers = is_array($firstRow) ? array_values($firstRow) : [];

        $required = self::REQUIRED_COLUMNS;
        $missing = array_values(array_diff($required, $headers));

        return [
            'valid' => empty($missing),
            'missing' => $missing,
        ];
    }

    /**
     * Return the number of data rows (excluding header) in the file.
     *
     * @return int 0 if unreadable or empty
     */
    public static function getDataRowCount(string $path, string $disk = 'local'): int
    {
        try {
            $import = new HeadingRowImport(1);
            $data = Excel::toArray($import, $path, $disk);
            $rows = $data[0] ?? [];

            return is_array($rows) ? count($rows) : 0;
        } catch (\Throwable $e) {
            return 0;
        }
    }
}
