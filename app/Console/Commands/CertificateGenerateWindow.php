<?php

namespace App\Console\Commands;

use App\CertificateExcellence;
use App\Excellence;
use Illuminate\Console\Command;

class CertificateGenerateWindow extends Command
{
    protected $signature = 'certificate:generate-window
                            {--edition=2025 : Target edition year}
                            {--type=all : excellence|super-organiser|all}
                            {--limit=500 : Max recipients to process per type in this run}
                            {--include-failed : Include rows with previous generation errors}';

    protected $description = 'Generate certificates in controlled windows (e.g. 500 at a time); use --type=all for both certs';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $limit = max(1, (int) $this->option('limit'));
        $includeFailed = (bool) $this->option('include-failed');
        $typeInput = strtolower(trim((string) $this->option('type')));
        $types = $this->resolveTypes($typeInput);
        if ($types === null) {
            $this->error("Invalid --type value: {$typeInput}. Use 'excellence', 'super-organiser', or 'all'.");
            return self::FAILURE;
        }

        $totalOk = 0;
        $totalFailed = 0;
        $any = false;

        foreach ($types as $type) {
            $result = $this->generateWindowForType($edition, $type, $limit, $includeFailed);
            $totalOk += $result['ok'];
            $totalFailed += $result['failed'];
            if ($result['processed'] > 0) {
                $any = true;
            }
        }

        $this->newLine();
        $this->info("Generate window(s) complete. Total success: {$totalOk}, Total failed: {$totalFailed}.");
        if ($any) {
            $this->line('Run the same command again to process the next batch.');
        }
        return self::SUCCESS;
    }

    /** @return array{processed: int, ok: int, failed: int} */
    private function generateWindowForType(int $edition, string $type, int $limit, bool $includeFailed): array
    {
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
            $this->line("  [{$type}] No pending recipients for this window.");
            return ['processed' => 0, 'ok' => 0, 'failed' => 0];
        }

        $this->info("[{$type}] Generating {$rows->count()} certificates (edition {$edition})...");
        $bar = $this->output->createProgressBar($rows->count());
        $bar->setFormat("  %current%/%max% [%bar%] %percent:3s%%");
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
        $this->newLine();
        $this->line("  [{$type}] Done. Success: {$ok}, Failed: {$failed}.");
        return ['processed' => $rows->count(), 'ok' => $ok, 'failed' => $failed];
    }

    /** @return array<string>|null */
    private function resolveTypes(string $typeInput): ?array
    {
        return match ($typeInput) {
            'all' => ['Excellence', 'SuperOrganiser'],
            'excellence' => ['Excellence'],
            'super-organiser', 'superorganiser' => ['SuperOrganiser'],
            default => null,
        };
    }
}
