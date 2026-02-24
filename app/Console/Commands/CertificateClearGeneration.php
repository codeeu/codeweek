<?php

namespace App\Console\Commands;

use App\Excellence;
use App\Jobs\GenerateCertificateBatchJob;
use App\Jobs\SendCertificateBatchJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CertificateClearGeneration extends Command
{
    protected $signature = 'certificate:clear-generation
                            {--edition=2025 : Target edition year}
                            {--type=all : excellence|super-organiser|all}
                            {--clear-send-state : Also clear notified_at and certificate_sent_error}
                            {--yes : Skip confirmation prompt}';

    protected $description = 'Clear certificate generation state for a year/type (optionally send state too)';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $typeOption = strtolower(trim((string) $this->option('type')));
        $clearSendState = (bool) $this->option('clear-send-state');
        $skipConfirm = (bool) $this->option('yes');

        $types = $this->resolveTypes($typeOption);
        if ($types === null) {
            $this->error("Invalid --type value: {$typeOption}. Use 'excellence', 'super-organiser', or 'all'.");
            return self::FAILURE;
        }

        if (! $skipConfirm) {
            $typeLabel = implode(', ', $types);
            $message = "This will clear certificate generation state for edition {$edition}, type(s): {$typeLabel}."
                . ($clearSendState ? ' It will ALSO clear send state (notified_at/sent_error).' : '');
            if (! $this->confirm($message . ' Continue?', false)) {
                $this->warn('Cancelled.');
                return self::SUCCESS;
            }
        }

        $update = [
            'certificate_url' => null,
            'certificate_generation_error' => null,
        ];
        if ($clearSendState) {
            $update['notified_at'] = null;
            $update['certificate_sent_error'] = null;
        }

        $totalUpdated = 0;
        foreach ($types as $type) {
            $updated = Excellence::query()
                ->where('edition', $edition)
                ->where('type', $type)
                ->update($update);

            $totalUpdated += $updated;
            $this->info("Updated rows for {$type}: {$updated}");

            Cache::forget(sprintf(GenerateCertificateBatchJob::CACHE_KEY_RUNNING, $edition, $type));
            Cache::forget(sprintf(GenerateCertificateBatchJob::CACHE_KEY_CANCELLED, $edition, $type));
            Cache::forget(sprintf(SendCertificateBatchJob::CACHE_KEY_SEND_RUNNING, $edition, $type));
        }

        $this->info("Done. Total rows updated: {$totalUpdated}");
        $this->line('Tip: run certificate:stats next to verify counts.');

        return self::SUCCESS;
    }

    /**
     * @return array<int, string>|null
     */
    private function resolveTypes(string $typeOption): ?array
    {
        return match ($typeOption) {
            'all' => ['Excellence', 'SuperOrganiser'],
            'excellence' => ['Excellence'],
            'super-organiser', 'superorganiser' => ['SuperOrganiser'],
            default => null,
        };
    }
}
