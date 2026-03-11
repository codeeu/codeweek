<?php

namespace App\Console\Commands;

use App\CertificateExcellence;
use App\Excellence;
use Illuminate\Console\Command;

class CertificateRegenerateGreekSuperOrganiser extends Command
{
    protected $signature = 'certificate:regenerate-greek-super-organiser
                            {--edition=2025 : Edition year}
                            {--dry-run : Only count and list, do not regenerate}';

    protected $description = 'Regenerate PDFs only for Greek Super Organisers (fix garbled “coding activities” text). Does not resend email.';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $dryRun = (bool) $this->option('dry-run');

        $query = Excellence::query()
            ->where('edition', $edition)
            ->where('type', 'SuperOrganiser')
            ->whereNotNull('certificate_url')
            ->with('user')
            ->orderBy('id');

        $rows = $query->get();
        $greekRows = $rows->filter(function (Excellence $e) {
            $name = $e->name_for_certificate ?? ($e->user ? trim(($e->user->firstname ?? '') . ' ' . ($e->user->lastname ?? '')) : '');
            return $this->nameContainsGreek($name);
        });

        $total = $greekRows->count();
        if ($total === 0) {
            $this->info("No Greek Super Organiser certificates found for edition {$edition} (with existing certificate_url).");
            return self::SUCCESS;
        }

        $this->info("Found {$total} Greek Super Organiser certificate(s) for edition {$edition}.");
        if ($dryRun) {
            $this->line('Dry run: no regeneration. Sample:');
            $greekRows->take(10)->each(fn (Excellence $e) => $this->line('  ' . ($e->user?->email ?? '?') . ' — ' . ($e->name_for_certificate ?? $e->user?->firstname . ' ' . $e->user?->lastname)));
            if ($total > 10) {
                $this->line('  ... and ' . ($total - 10) . ' more.');
            }
            return self::SUCCESS;
        }

        $this->info('Regenerating PDFs only (certificate_url will be updated; no email sent).');
        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $ok = 0;
        $failed = 0;
        $failures = [];

        foreach ($greekRows as $excellence) {
            $bar->advance();
            $user = $excellence->user;
            if (! $user) {
                $failed++;
                $failures[] = ['id' => $excellence->id, 'email' => '-', 'error' => 'User missing'];
                continue;
            }

            $name = $excellence->name_for_certificate ?? trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? ''));
            $name = $name !== '' ? $name : 'Unknown';
            $numberOfActivities = (int) $user->activities($edition);

            try {
                $cert = new CertificateExcellence(
                    $edition,
                    $name,
                    'super-organiser',
                    $numberOfActivities,
                    (int) $user->id,
                    (string) ($user->email ?? '')
                );
                // Overwrite existing S3 file so the same URL serves the new PDF (no need to resend email)
                $url = $cert->generateReplacing($excellence->certificate_url);
                $excellence->update([
                    'certificate_url' => $url,
                    'certificate_generation_error' => null,
                ]);
                $ok++;
            } catch (\Throwable $e) {
                $failed++;
                $excellence->update(['certificate_generation_error' => $e->getMessage()]);
                $failures[] = ['id' => $excellence->id, 'email' => $user->email ?? '-', 'error' => $e->getMessage()];
            }
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("Done. Regenerated: {$ok}, Failed: {$failed}. No emails sent; existing certificate links now point to the new PDFs.");
        if ($failed > 0 && count($failures) > 0) {
            $this->table(['id', 'email', 'error'], array_slice($failures, 0, 20));
            if (count($failures) > 20) {
                $this->line('(First 20 failures shown.)');
            }
        }

        return $failed > 0 ? self::FAILURE : self::SUCCESS;
    }

    private function nameContainsGreek(string $name): bool
    {
        $split = preg_split('/[\p{Greek}]/u', $name);
        return $split !== false && count($split) > 1;
    }
}
