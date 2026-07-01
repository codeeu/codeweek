<?php

namespace App\Services\BulkUserChanges;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

final class BulkUserChangesSheetReader
{
    public function __construct(
        private readonly BulkUserChangesRowNormalizer $normalizer,
    ) {
    }

    /**
     * @return array{
     *   sheet_name: string,
     *   header_row: int,
     *   rows: list<array<string, mixed>>,
     *   meta: array{
     *     first_data_row: ?int,
     *     last_data_row: ?int,
     *     parsed_rows: int,
     *     skipped_blank_rows: int,
     *     skipped_no_email_rows: int,
     *     skipped_legacy_rows: int,
     *     first_email: ?string,
     *     last_email: ?string,
     *   }
     * }
     */
    public function read(string $path, ?string $disk = null): array
    {
        $localPath = $path;
        if ($disk !== null) {
            $localPath = $this->materializeFromDisk($path, $disk);
        }

        $spreadsheet = IOFactory::load($localPath);
        $sheet = $this->resolveChangesSheet($spreadsheet->getSheetNames(), $spreadsheet);
        $headerRow = $this->detectHeaderRow($sheet);
        $columnMap = $this->mapColumns($sheet, $headerRow);
        $lastDataRow = $this->detectLastDataRow($sheet, $headerRow, $columnMap);

        $rows = [];
        $skippedBlank = 0;
        $skippedNoEmail = 0;
        $skippedLegacy = 0;

        for ($rowNumber = $headerRow + 1; $rowNumber <= $lastDataRow; $rowNumber++) {
            $raw = $this->readRow($sheet, $rowNumber, $columnMap);

            if ($this->isBlankDataRow($raw)) {
                $skippedBlank++;

                continue;
            }

            if ($this->isLegacyCountry($raw['country'] ?? null)) {
                $skippedLegacy++;

                continue;
            }

            $normalized = $this->normalizer->normalize($raw);

            if ($normalized['email'] === null) {
                $skippedNoEmail++;

                continue;
            }

            $rows[] = [
                'row_number' => $rowNumber,
                ...$normalized,
            ];
        }

        $firstRow = $rows[0]['row_number'] ?? null;
        $lastRow = $rows !== [] ? $rows[array_key_last($rows)]['row_number'] : null;

        return [
            'sheet_name' => $sheet->getTitle(),
            'header_row' => $headerRow,
            'rows' => $rows,
            'meta' => [
                'first_data_row' => $firstRow,
                'last_data_row' => $lastRow,
                'parsed_rows' => count($rows),
                'skipped_blank_rows' => $skippedBlank,
                'skipped_no_email_rows' => $skippedNoEmail,
                'skipped_legacy_rows' => $skippedLegacy,
                'first_email' => $rows[0]['email'] ?? null,
                'last_email' => $rows !== [] ? $rows[array_key_last($rows)]['email'] : null,
            ],
        ];
    }

    private function materializeFromDisk(string $path, string $disk): string
    {
        $contents = \Illuminate\Support\Facades\Storage::disk($disk)->get($path);
        $tmp = tempnam(sys_get_temp_dir(), 'bulk_user_changes_');
        if ($tmp === false) {
            throw new \RuntimeException('Could not create temp file for bulk user changes upload.');
        }
        file_put_contents($tmp, $contents);

        return $tmp;
    }

  /**
     * @param  list<string>  $sheetNames
     */
    private function resolveChangesSheet(array $sheetNames, \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet): Worksheet
    {
        foreach ($sheetNames as $name) {
            if (strcasecmp(trim($name), 'changes') === 0) {
                $sheet = $spreadsheet->getSheetByName($name);
                if ($sheet instanceof Worksheet) {
                    return $sheet;
                }
            }
        }

        $available = implode(', ', array_map(fn (string $n) => '"'.$n.'"', $sheetNames));

        throw new \InvalidArgumentException(
            'No sheet named "Changes" found. Only the Changes tab is read; other sheets are ignored. '
            .'Sheets in this file: '.($available !== '' ? $available : '(none)').'.'
        );
    }

    private function detectHeaderRow(Worksheet $sheet): int
    {
        $highest = min((int) $sheet->getHighestRow(), 500);
        $headerRow = 1;

        for ($row = 1; $row <= $highest; $row++) {
            if (! $this->rowLooksLikeHeader($sheet, $row)) {
                continue;
            }

            $headerRow = $row;
        }

        return $headerRow;
    }

    /**
     * @param  array<string, string>  $columnMap
     */
    private function detectLastDataRow(Worksheet $sheet, int $headerRow, array $columnMap): int
    {
        $scanLimit = min((int) $sheet->getHighestRow(), $headerRow + 2000);
        $lastDataRow = $headerRow;

        for ($rowNumber = $headerRow + 1; $rowNumber <= $scanLimit; $rowNumber++) {
            $raw = $this->readRow($sheet, $rowNumber, $columnMap);

            if ($this->isBlankDataRow($raw)) {
                continue;
            }

            $lastDataRow = $rowNumber;
        }

        return $lastDataRow;
    }

    private function rowLooksLikeHeader(Worksheet $sheet, int $row): bool
    {
        $values = array_map(
            fn ($v) => mb_strtolower(trim((string) $v)),
            array_values($sheet->rangeToArray('A'.$row.':H'.$row, null, true, true, true)[$row] ?? []),
        );

        return $this->rowContains($values, 'country')
            && $this->rowContains($values, 'email')
            && $this->rowContains($values, 'action');
    }

    /**
     * @param  array<string, ?string>  $raw
     */
    private function isBlankDataRow(array $raw): bool
    {
        foreach (['country', 'full_name', 'email', 'action', 'role', 'comments'] as $field) {
            if (($raw[$field] ?? null) !== null) {
                return false;
            }
        }

        return true;
    }

    private function isLegacyCountry(?string $country): bool
    {
        if ($country === null) {
            return false;
        }

        return str_starts_with($country, '#');
    }

    /**
     * @param  list<string>  $values
     */
    private function rowContains(array $values, string $needle): bool
    {
        foreach ($values as $value) {
            if ($value !== '' && str_contains($value, $needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array<string, string>
     */
    private function mapColumns(Worksheet $sheet, int $headerRow): array
    {
        $headers = array_values($sheet->rangeToArray('A'.$headerRow.':N'.$headerRow, null, true, true, true)[$headerRow] ?? []);
        $map = [];

        foreach ($headers as $index => $header) {
            $key = mb_strtolower(trim((string) $header));
            if ($key === '') {
                continue;
            }

            $column = chr(ord('A') + $index);
            if ($index >= 26) {
                continue;
            }

            if (str_contains($key, 'country')) {
                $map['country'] = $column;
            } elseif (str_contains($key, 'full name') || $key === 'name') {
                $map['full_name'] = $column;
            } elseif (str_contains($key, 'email')) {
                $map['email'] = $column;
            } elseif ($key === 'action') {
                $map['action'] = $column;
            } elseif ($key === 'role') {
                $map['role'] = $column;
            } elseif (str_contains($key, 'comment')) {
                $map['comments'] ??= $column;
            }
        }

        return $map;
    }

    /**
     * @param  array<string, string>  $columnMap
     * @return array<string, ?string>
     */
    private function readRow(Worksheet $sheet, int $rowNumber, array $columnMap): array
    {
        $out = [
            'country' => null,
            'full_name' => null,
            'email' => null,
            'action' => null,
            'role' => null,
            'comments' => null,
        ];

        foreach ($columnMap as $field => $column) {
            $out[$field] = $this->stringOrNull($sheet->getCell($column.$rowNumber)->getValue());
        }

        return $out;
    }

    private function stringOrNull(mixed $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim((string) $value);

        return $value === '' ? null : $value;
    }
}
