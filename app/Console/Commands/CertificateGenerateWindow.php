<?php

namespace App\Console\Commands;

use App\CertificateExcellence;
use App\Excellence;
use Illuminate\Console\Command;

class CertificateGenerateWindow extends Command
{
    protected $signature = 'certificate:generate-window
                            {--edition=2025 : Target edition year}
                            {--type=excellence : excellence|super-organiser}
                            {--limit=500 : Max recipients to process in this run}
                            {--include-failed : Include rows with previous generation errors}';

    protected $description = 'Generate certificates in controlled windows (e.g. 500 at a time)';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $limit = max(1, (int) $this->option('limit'));
        $includeFailed = (bool) $this->option('include-failed');
        $typeInput = strtolower(trim((string) $this->option('type')));
        $type = match ($typeInput) {
            'excellence' => 'Excellence',
            'super-organiser', 'superorganiser' => 'SuperOrganiser',
            default => null,
        };

        if ($type === null) {
            $this->error("Invalid --type value: {$typeInput}. Use 'excellence' or 'super-organiser'.");
            return self::FAILURE;
        }

        $query = Excellence::query()
            ->where('edition', $edition)
            ->where('type', $type)
            ->where(function ($q) use ($includeFailed) {
                $q->whereNull('certificate_url');
                if (! $includeFailed) {
                    $q->whereNull('certificate_generation_error');
                }
            })
            ->with('user')
            ->orderBy('id')
            ->limit($limit);

        $rows = $query->get();
        if ($rows->isEmpty()) {
            $this->info('No pending recipients found for this window.');
            return self::SUCCESS;
        }

        $this->info("Generating {$rows->count()} {$type} certificates for edition {$edition}...");
        $bar = $this->output->createProgressBar($rows->count());
        $bar->start();

        $ok = 0;
        $failed = 0;

        foreach ($rows as $excellence) {
            $bar->advance();
            $user = $excellence->user;
            if (! $user) {
                $failed++;
                $excellence->update(['certificate_generation_error' => 'User missing.']);
                continue;
            }

            $name = $excellence->name_for_certificate ?? trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? ''));
            $name = $name !== '' ? $name : 'Unknown';
            $certType = $type === 'SuperOrganiser' ? 'super-organiser' : 'excellence';
            $numberOfActivities = $type === 'SuperOrganiser' ? (int) $user->activities($edition) : 0;

            try {
                $cert = new CertificateExcellence(
                    $edition,
                    $name,
                    $certType,
                    $numberOfActivities,
                    (int) $user->id,
                    (string) ($user->email ?? '')
                );
                $url = $cert->generate();
                $excellence->update([
                    'certificate_url' => $url,
                    'certificate_generation_error' => null,
                ]);
                $ok++;
            } catch (\Throwable $e) {
                $failed++;
                $excellence->update([
                    'certificate_generation_error' => $e->getMessage(),
                ]);
            }
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("Window complete. Success: {$ok}, Failed: {$failed}.");
        $this->line('Run the same command again to process the next window.');

        return self::SUCCESS;
    }
}
