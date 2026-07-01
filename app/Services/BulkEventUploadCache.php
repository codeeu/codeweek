<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

final class BulkEventUploadCache
{
    public const PHASE_VALIDATING = 'validating';

    public const PHASE_VALIDATED = 'validated';

    public const PHASE_IMPORTING = 'importing';

    public const PHASE_COMPLETED = 'completed';

    public const PHASE_FAILED = 'failed';

    /** Above this row count, preview shows failures only (not every green row). */
    public const PREVIEW_FAILURES_ONLY_THRESHOLD = 500;

    public static function key(string $token): string
    {
        return 'bulk_upload_'.$token;
    }

    /**
     * @return array<string, mixed>|null
     */
    public static function get(string $token): ?array
    {
        $payload = Cache::get(self::key($token));

        return is_array($payload) ? $payload : null;
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public static function put(string $token, array $data): void
    {
        Cache::put(self::key($token), $data, now()->addHours(2));
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public static function merge(string $token, array $data): void
    {
        self::put($token, array_merge(self::get($token) ?? [], $data));
    }

    /**
     * @return array{
     *   valid_count: int,
     *   total_count: int,
     *   failures_only: bool,
     *   row_statuses: list<array{row: int, valid: bool, message?: string}>
     * }
     */
    public static function previewFromResult(BulkEventImportResult $result): array
    {
        $validCount = count($result->valid);
        $failureCount = count($result->failures);
        $totalCount = max($result->rowsProcessed, $validCount + $failureCount);
        $failuresOnly = $totalCount > self::PREVIEW_FAILURES_ONLY_THRESHOLD;

        $rowStatuses = [];

        if ($failuresOnly) {
            foreach ($result->failures as $row => $message) {
                $rowStatuses[] = [
                    'row' => (int) $row,
                    'valid' => false,
                    'message' => $message,
                ];
            }
        } else {
            foreach ($result->valid as $row => $_) {
                $rowStatuses[] = ['row' => (int) $row, 'valid' => true];
            }
            foreach ($result->failures as $row => $message) {
                $rowStatuses[] = [
                    'row' => (int) $row,
                    'valid' => false,
                    'message' => $message,
                ];
            }

            usort($rowStatuses, fn (array $a, array $b) => $a['row'] <=> $b['row']);
        }

        return [
            'valid_count' => $validCount,
            'total_count' => $totalCount,
            'failures_only' => $failuresOnly,
            'row_statuses' => $rowStatuses,
        ];
    }
}
