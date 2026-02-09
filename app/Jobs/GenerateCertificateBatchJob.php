<?php

namespace App\Jobs;

use App\CertificateExcellence;
use App\Excellence;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GenerateCertificateBatchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public const BATCH_SIZE = 50;
    public const CACHE_KEY_RUNNING = 'certificate_generation_running_%s_%s';
    public const CACHE_KEY_CANCELLED = 'certificate_generation_cancelled_%s_%s';
    public const CACHE_TTL_SECONDS = 86400; // 24h
    /** If "running" was set longer ago than this (seconds), treat as stale and clear it */
    public const RUNNING_STALE_SECONDS = 7200; // 2 hours

    public function __construct(
        public int $edition,
        public string $type,
        public int $offset = 0
    ) {}

    public function handle(): void
    {
        $runningKey = sprintf(self::CACHE_KEY_RUNNING, $this->edition, $this->type);
        $cancelledKey = sprintf(self::CACHE_KEY_CANCELLED, $this->edition, $this->type);

        if (Cache::get($cancelledKey)) {
            Cache::forget($runningKey);
            Log::info("Certificate generation cancelled for edition {$this->edition} type {$this->type}");
            return;
        }

        Cache::put($runningKey, time(), self::CACHE_TTL_SECONDS);

        $query = Excellence::query()
            ->where('edition', $this->edition)
            ->where('type', $this->type)
            ->with('user')
            ->orderBy('id');

        // Either no cert yet, or had a generation error (retry)
        $query->where(function ($q) {
            $q->whereNull('certificate_url')
                ->orWhereNotNull('certificate_generation_error');
        });

        $rows = $query->offset($this->offset)->limit(self::BATCH_SIZE)->get();

        if ($rows->isEmpty()) {
            Cache::forget($runningKey);
            Log::info("Certificate generation finished for edition {$this->edition} type {$this->type}");
            return;
        }

        $certType = $this->type === 'SuperOrganiser' ? 'super-organiser' : 'excellence';

        foreach ($rows as $excellence) {
            if (Cache::get($cancelledKey)) {
                break;
            }

            $user = $excellence->user;
            $name = $excellence->name_for_certificate ?? ($user ? trim($user->firstname . ' ' . $user->lastname) : '') ?: 'Unknown';
            $email = $user?->email ?? '';
            $userId = $user?->id ?? 0;

            $numberOfActivities = 0;
            if ($this->type === 'SuperOrganiser' && $user) {
                $numberOfActivities = $user->activities($this->edition);
            }

            try {
                $cert = new CertificateExcellence(
                    $this->edition,
                    $name,
                    $certType,
                    $numberOfActivities,
                    $userId,
                    $email
                );
                $url = $cert->generate();
                $excellence->update([
                    'certificate_url' => $url,
                    'certificate_generation_error' => null,
                ]);
            } catch (\Throwable $e) {
                Log::error("Certificate generation failed for excellence id {$excellence->id}: " . $e->getMessage());
                $excellence->update([
                    'certificate_generation_error' => $e->getMessage(),
                ]);
            }
        }

        $nextOffset = $this->offset + $rows->count();
        $hasMore = Excellence::query()
            ->where('edition', $this->edition)
            ->where('type', $this->type)
            ->where(function ($q) {
                $q->whereNull('certificate_url')->orWhereNotNull('certificate_generation_error');
            })
            ->offset($nextOffset)
            ->limit(1)
            ->exists();

        if ($hasMore && ! Cache::get($cancelledKey)) {
            self::dispatch($this->edition, $this->type, $nextOffset);
        } else {
            Cache::forget($runningKey);
        }
    }
}
