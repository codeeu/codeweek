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
                            {--limit=500 : Max recipients to process per type per batch}
                            {--include-failed : Include rows with previous generation errors}
                            {--once : Run only one batch per type then stop (default: run until no pending left)}';

    protected $description = 'Generate certificates in batches; runs until no pending left (use --once for single batch)';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $limit = max(1, (int) $this->option('limit'));
        $includeFailed = (bool) $this->option('include-failed');
        $once = (bool) $this->option('once');
        $typeInput = strtolower(trim((string) $this->option('type')));
        $types = $this->resolveTypes($typeInput);
        if ($types === null) {
            $this->error("Invalid --type value: {$typeInput}. Use 'excellence', 'super-organiser', or 'all'.");
            return self::FAILURE;
        }

        $totalOk = 0;
        $totalFailed = 0;
        $batchCount = 0;

        foreach ($types as $type) {
            do {
                $result = $this->generateWindowForType($edition, $type, $limit, $includeFailed);
                $totalOk += $result['ok'];
                $totalFailed += $result['failed'];
                if ($result['processed'] > 0) {
                    $batchCount++;
                }
            } while (! $once && $result['processed'] > 0);
        }

        $this->newLine();
        $this->info("Generate complete. Batches: {$batchCount}, Total success: {$totalOk}, Total failed: {$totalFailed}.");
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
