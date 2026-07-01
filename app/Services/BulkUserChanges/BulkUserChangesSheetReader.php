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
     *   meta: array{total_sheet_rows: int, parsed_rows: int, skipped_blank_rows: int}
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

        $rows = [];
        $skippedBlank = 0;
        $highest = (int) $sheet->getHighestRow();

        for ($rowNumber = $headerRow + 1; $rowNumber <= $highest; $rowNumber++) {
            $raw = $this->readRow($sheet, $rowNumber, $columnMap);
            $normalized = $this->normalizer->normalize($raw);

            if ($normalized['email'] === null && $normalized['operation'] === null) {
                $skippedBlank++;

                continue;
            }

            $rows[] = [
                'row_number' => $rowNumber,
                ...$normalized,
            ];
        }

        return [
            'sheet_name' => $sheet->getTitle(),
            'header_row' => $headerRow,
            'rows' => $rows,
            'meta' => [
                'total_sheet_rows' => max(0, $highest - $headerRow),
                'parsed_rows' => count($rows),
                'skipped_blank_rows' => $skippedBlank,
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

        return $spreadsheet->getSheet(0);
    }

    private function detectHeaderRow(Worksheet $sheet): int
    {
        $highest = min((int) $sheet->getHighestRow(), 300);

        for ($row = 1; $row <= $highest; $row++) {
            $values = array_map(
                fn ($v) => mb_strtolower(trim((string) $v)),
                array_values($sheet->rangeToArray('A'.$row.':H'.$row, null, true, true, true)[$row] ?? []),
            );

            $hasCountry = $this->rowContains($values, 'country');
            $hasEmail = $this->rowContains($values, 'email');
            $hasAction = $this->rowContains($values, 'action');

            if ($hasCountry && $hasEmail && $hasAction) {
                return $row;
            }
        }

        return 1;
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
