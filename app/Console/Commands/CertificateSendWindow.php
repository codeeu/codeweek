<?php

namespace App\Console\Commands;

use App\Excellence;
use App\Mail\NotifySuperOrganiser;
use App\Mail\NotifyWinner;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CertificateSendWindow extends Command
{
    protected $signature = 'certificate:send-window
                            {--edition=2025 : Target edition year}
                            {--type=all : excellence|super-organiser|all}
                            {--limit=500 : Max recipients to send per type per batch}
                            {--include-send-failed : Include rows that previously failed sending}
                            {--once : Run only one batch per type then stop (default: run until no recipients left)}';

    protected $description = 'Send certificate emails in batches; runs until no recipients left (use --once for single batch)';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $limit = max(1, (int) $this->option('limit'));
        $includeSendFailed = (bool) $this->option('include-send-failed');
        $once = (bool) $this->option('once');
        $typeInput = strtolower(trim((string) $this->option('type')));
        $types = $this->resolveTypes($typeInput);
        if ($types === null) {
            $this->error("Invalid --type value: {$typeInput}. Use 'excellence', 'super-organiser', or 'all'.");
            return self::FAILURE;
        }

        $totalQueued = 0;
        $totalFailed = 0;
        $batchCount = 0;

        foreach ($types as $type) {
            do {
                $result = $this->sendWindowForType($edition, $type, $limit, $includeSendFailed);
                $totalQueued += $result['queued'];
                $totalFailed += $result['failed'];
                if ($result['processed'] > 0) {
                    $batchCount++;
                }
            } while (! $once && $result['processed'] > 0);
        }

        $this->newLine();
        $this->info("Send complete. Batches: {$batchCount}, Total queued: {$totalQueued}, Total failed: {$totalFailed}.");
        $this->line('Ensure queue worker is running to deliver: php artisan queue:work');
        return self::SUCCESS;
    }

    /** @return array{processed: int, queued: int, failed: int} */
    private function sendWindowForType(int $edition, string $type, int $limit, bool $includeSendFailed): array
    {
        $query = Excellence::query()
            ->where('edition', $edition)
            ->where('type', $type)
            ->where(function ($q) use ($includeSendFailed) {
                $q->whereNull('notified_at');
                if ($includeSendFailed) {
                    $q->orWhereNotNull('certificate_sent_error');
                }
            })
            ->with('user')
            ->orderBy('id')
            ->limit($limit);

        $rows = $query->get();
        if ($rows->isEmpty()) {
            $this->line("  [{$type}] No recipients left for this window.");
            return ['processed' => 0, 'queued' => 0, 'failed' => 0];
        }

        $this->info("[{$type}] Queueing {$rows->count()} emails (edition {$edition})...");
        $bar = $this->output->createProgressBar($rows->count());
        $bar->setFormat("  %current%/%max% [%bar%] %percent:3s%%");
        $bar->start();

        $queued = 0;
        $failed = 0;

        foreach ($rows as $excellence) {
            $bar->advance();
            $user = $excellence->user;
            if (! $user || ! $user->email) {
                $failed++;
                $excellence->update(['certificate_sent_error' => 'No user or email']);
                continue;
            }

            try {
                if ($type === 'SuperOrganiser') {
                    Mail::to($user->email)->queue(new NotifySuperOrganiser($user, $edition, $excellence->certificate_url));
                } else {
                    Mail::to($user->email)->queue(new NotifyWinner($user, $edition, $excellence->certificate_url));
                }
                $excellence->update([
                    'notified_at' => Carbon::now(),
                    'certificate_sent_error' => null,
                ]);
                $queued++;
            } catch (\Throwable $e) {
                $failed++;
                $excellence->update(['certificate_sent_error' => $e->getMessage()]);
            }
        }

        $bar->finish();
        $this->newLine();
        $this->line("  [{$type}] Done. Queued: {$queued}, Failed: {$failed}.");
        return ['processed' => $rows->count(), 'queued' => $queued, 'failed' => $failed];
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
