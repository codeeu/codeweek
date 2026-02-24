<?php

namespace App\Console\Commands;

use App\Excellence;
use App\Jobs\GenerateCertificateBatchJob;
use Illuminate\Console\Command;

class CertificateRetryFailed extends Command
{
    protected $signature = 'certificate:retry-failed
                            {--edition=2025 : Target edition year}
                            {--type=excellence : excellence|super-organiser}
                            {--limit=200 : Max failed rows to reset}
                            {--dispatch : Dispatch generation job after reset}';

    protected $description = 'Reset failed certificate generation rows for retry in controlled batches';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $typeOption = (string) $this->option('type');
        $limit = max(1, (int) $this->option('limit'));
        $shouldDispatch = (bool) $this->option('dispatch');

        $type = $this->normalizeType($typeOption);
        if ($type === null) {
            $this->error("Invalid --type value: {$typeOption}. Use 'excellence' or 'super-organiser'.");
            return self::FAILURE;
        }

        $baseQuery = Excellence::query()
            ->where('edition', $edition)
            ->where('type', $type)
            ->whereNull('certificate_url')
            ->whereNotNull('certificate_generation_error');

        $totalFailed = (clone $baseQuery)->count();
        if ($totalFailed === 0) {
            $this->info("No failed generation rows found for edition {$edition}, type {$type}.");
            return self::SUCCESS;
        }

        $ids = (clone $baseQuery)->orderBy('id')->limit($limit)->pluck('id')->toArray();
        $resetCount = 0;
        if (!empty($ids)) {
            $resetCount = Excellence::query()
                ->whereIn('id', $ids)
                ->update(['certificate_generation_error' => null]);
        }

        $this->info("Failed rows found: {$totalFailed}");
        $this->info("Reset for retry: {$resetCount} (limit: {$limit})");

        if ($shouldDispatch && $resetCount > 0) {
            GenerateCertificateBatchJob::dispatch($edition, $type, 0);
            $this->info("Generation job dispatched for edition {$edition}, type {$type}.");
        } else {
            $this->line('No job dispatched. Use --dispatch to start generation immediately.');
        }

        return self::SUCCESS;
    }

    private function normalizeType(string $typeOption): ?string
    {
        $slug = strtolower(trim($typeOption));
        return match ($slug) {
            'excellence' => 'Excellence',
            'super-organiser', 'superorganiser' => 'SuperOrganiser',
            default => null,
        };
    }
}
