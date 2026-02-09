<?php

namespace App\Jobs;

use App\Excellence;
use App\Mail\NotifySuperOrganiser;
use App\Mail\NotifyWinner;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCertificateBatchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public const BATCH_SIZE = 100;

    public function __construct(
        public int $edition,
        public string $type,
        public int $offset = 0
    ) {}

    public function handle(): void
    {
        // Send to: has cert and (not yet sent or had send error)
        $query = Excellence::query()
            ->where('edition', $this->edition)
            ->where('type', $this->type)
            ->whereNotNull('certificate_url')
            ->where(function ($q) {
                $q->whereNull('notified_at')->orWhereNotNull('certificate_sent_error');
            })
            ->with('user')
            ->orderBy('id');

        $rows = $query->offset($this->offset)->limit(self::BATCH_SIZE)->get();

        foreach ($rows as $excellence) {
            $user = $excellence->user;
            if (! $user || ! $user->email) {
                $excellence->update(['certificate_sent_error' => 'No user or email']);
                continue;
            }

            try {
                if ($this->type === 'SuperOrganiser') {
                    Mail::to($user->email)->queue(new NotifySuperOrganiser($user, $this->edition, $excellence->certificate_url));
                } else {
                    Mail::to($user->email)->queue(new NotifyWinner($user, $this->edition, $excellence->certificate_url));
                }
                $excellence->update([
                    'notified_at' => Carbon::now(),
                    'certificate_sent_error' => null,
                ]);
            } catch (\Throwable $e) {
                $excellence->update([
                    'certificate_sent_error' => $e->getMessage(),
                ]);
            }
        }

        $nextOffset = $this->offset + $rows->count();
        $hasMore = Excellence::query()
            ->where('edition', $this->edition)
            ->where('type', $this->type)
            ->whereNotNull('certificate_url')
            ->where(function ($q) {
                $q->whereNull('notified_at')->orWhereNotNull('certificate_sent_error');
            })
            ->offset($nextOffset)
            ->limit(1)
            ->exists();

        if ($hasMore) {
            self::dispatch($this->edition, $this->type, $nextOffset);
        }
    }
}
