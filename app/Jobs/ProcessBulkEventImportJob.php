<?php

namespace App\Jobs;

use App\Imports\GenericEventsImport;
use App\Services\BulkEventImportResult;
use App\Services\BulkEventUploadCache;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProcessBulkEventImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 3600;

    public int $tries = 1;

    public function __construct(
        public readonly string $token,
    ) {
    }

    public function handle(): void
    {
        $payload = BulkEventUploadCache::get($this->token);
        if ($payload === null) {
            return;
        }

        $path = (string) ($payload['path'] ?? '');
        $disk = (string) ($payload['disk'] ?? 'local');
        $defaultCreatorEmail = $payload['default_creator_email'] ?? null;

        if ($path === '' || ! Storage::disk($disk)->exists($path)) {
            BulkEventUploadCache::merge($this->token, [
                'phase' => BulkEventUploadCache::PHASE_FAILED,
                'error' => 'Uploaded file is no longer available. Please upload again.',
            ]);

            return;
        }

        BulkEventUploadCache::merge($this->token, [
            'phase' => BulkEventUploadCache::PHASE_IMPORTING,
            'error' => null,
        ]);

        try {
            $result = new BulkEventImportResult;
            $preview = $payload['preview'] ?? [];
            $totalRows = (int) ($preview['total_count'] ?? 0);
            $result->trackCreatedDetails = $totalRows <= BulkEventUploadCache::PREVIEW_FAILURES_ONLY_THRESHOLD;

            $import = new GenericEventsImport($defaultCreatorEmail, $result);
            Excel::import($import, $path, $disk);

            Storage::disk($disk)->delete($path);
            Cache::flush();

            BulkEventUploadCache::merge($this->token, [
                'phase' => BulkEventUploadCache::PHASE_COMPLETED,
                'path' => null,
                'report' => [
                    'created' => $result->created,
                    'created_count' => $result->createdCount,
                    'created_details_truncated' => ! $result->trackCreatedDetails,
                    'failures' => $result->failures,
                ],
                'error' => null,
            ]);
        } catch (\Throwable $e) {
            Log::error('Bulk event upload import failed: '.$e->getMessage(), [
                'token' => $this->token,
            ]);

            if (Storage::disk($disk)->exists($path)) {
                Storage::disk($disk)->delete($path);
            }

            BulkEventUploadCache::merge($this->token, [
                'phase' => BulkEventUploadCache::PHASE_FAILED,
                'error' => 'Import failed: '.$e->getMessage(),
            ]);
        }
    }
}
