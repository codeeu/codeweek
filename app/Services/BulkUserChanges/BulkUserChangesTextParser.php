<?php

namespace App\Services\BulkUserChanges;

use InvalidArgumentException;

final class BulkUserChangesTextParser
{
    private const LINES_PER_RECORD = 5;

    public function __construct(
        private readonly BulkUserChangesRowNormalizer $normalizer,
    ) {
    }

    /**
     * @return array{
     *   sheet_name: string,
     *   header_row: null,
     *   source: string,
     *   rows: list<array<string, mixed>>,
     *   meta: array{
     *     first_data_row: ?int,
     *     last_data_row: ?int,
     *     parsed_rows: int,
     *     skipped_blank_rows: int,
     *     skipped_no_email_rows: int,
     *     skipped_legacy_rows: int,
     *     skipped_ignored_range_rows: int,
     *     ignore_through_row: null,
     *     first_email: ?string,
     *     last_email: ?string,
     *   }
     * }
     */
    public function parse(string $text): array
    {
        $lines = $this->splitLines($text);
        if ($lines === []) {
            throw new InvalidArgumentException('Paste is empty.');
        }

        if (count($lines) % self::LINES_PER_RECORD !== 0) {
            throw new InvalidArgumentException(
                'Paste must be groups of 5 lines (country, name, email, action, role or new email). Found '
                .count($lines).' non-empty lines.'
            );
        }

        $rows = [];
        $skippedNoEmail = 0;
        $entryNumber = 1;

        for ($offset = 0; $offset < count($lines); $offset += self::LINES_PER_RECORD) {
            $raw = $this->rawRecordFromLines(array_slice($lines, $offset, self::LINES_PER_RECORD));
            $normalized = $this->normalizer->normalize($raw);

            if ($normalized['email'] === null) {
                $skippedNoEmail++;

                continue;
            }

            $rows[] = [
                'row_number' => $entryNumber,
                ...$normalized,
            ];
            $entryNumber++;
        }

        if ($rows === []) {
            throw new InvalidArgumentException('No valid email addresses found in pasted text.');
        }

        $firstRow = $rows[0]['row_number'] ?? null;
        $lastRow = $rows !== [] ? $rows[array_key_last($rows)]['row_number'] : null;

        return [
            'sheet_name' => 'Pasted list',
            'header_row' => null,
            'source' => 'paste',
            'rows' => $rows,
            'meta' => [
                'first_data_row' => $firstRow,
                'last_data_row' => $lastRow,
                'parsed_rows' => count($rows),
                'skipped_blank_rows' => 0,
                'skipped_no_email_rows' => $skippedNoEmail,
                'skipped_legacy_rows' => 0,
                'skipped_ignored_range_rows' => 0,
                'ignore_through_row' => null,
                'first_email' => $rows[0]['email'] ?? null,
                'last_email' => $rows !== [] ? $rows[array_key_last($rows)]['email'] : null,
            ],
        ];
    }

    /**
     * @return list<string>
     */
    private function splitLines(string $text): array
    {
        $text = str_replace("\r\n", "\n", $text);
        $text = str_replace("\r", "\n", $text);

        $lines = [];
        foreach (explode("\n", $text) as $line) {
            $line = trim($line);
            if ($line !== '') {
                $lines[] = $line;
            }
        }

        return $lines;
    }

    /**
     * @param  list<string>  $lines
     * @return array<string, ?string>
     */
    private function rawRecordFromLines(array $lines): array
    {
        [$country, $fullName, $email, $action, $detail] = $lines;
        $actionLower = mb_strtolower(trim($action));
        $detailLower = mb_strtolower(trim($detail));

        $isEmailChange = str_contains($actionLower, 'email change')
            || str_contains($actionLower, 'email update')
            || str_contains($detailLower, 'new email');

        return [
            'country' => $country,
            'full_name' => $fullName,
            'email' => $email,
            'action' => $action,
            'role' => $isEmailChange ? $detail : $detail,
            'comments' => $isEmailChange ? $detail : null,
        ];
    }
}
