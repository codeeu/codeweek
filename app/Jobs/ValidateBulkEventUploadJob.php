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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ValidateBulkEventUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 1800;

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

        try {
            $result = new BulkEventImportResult;
            $import = new GenericEventsImport($defaultCreatorEmail, $result, true);
            Excel::import($import, $path, $disk);

            $preview = BulkEventUploadCache::previewFromResult($result);

            BulkEventUploadCache::merge($this->token, [
                'phase' => BulkEventUploadCache::PHASE_VALIDATED,
                'error' => null,
                'preview' => $preview,
            ]);
        } catch (\Throwable $e) {
            Log::error('Bulk event upload validation failed: '.$e->getMessage(), [
                'token' => $this->token,
            ]);

            BulkEventUploadCache::merge($this->token, [
                'phase' => BulkEventUploadCache::PHASE_FAILED,
                'error' => 'Validation failed: '.$e->getMessage(),
            ]);
        }
    }
}
