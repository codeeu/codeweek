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
                            {--type=excellence : excellence|super-organiser}
                            {--limit=500 : Max recipients to send in this run}
                            {--include-send-failed : Include rows that previously failed sending}';

    protected $description = 'Send certificate emails in controlled windows (e.g. 500 at a time)';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $limit = max(1, (int) $this->option('limit'));
        $includeSendFailed = (bool) $this->option('include-send-failed');
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
            $this->info('No recipients found for this send window.');
            return self::SUCCESS;
        }

        $this->info("Queueing {$rows->count()} {$type} emails for edition {$edition}...");
        $bar = $this->output->createProgressBar($rows->count());
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
        $this->newLine(2);
        $this->info("Send window complete. Queued: {$queued}, Failed: {$failed}.");
        $this->line('Run again to process the next send window.');

        return self::SUCCESS;
    }
}
