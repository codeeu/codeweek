<?php

namespace App\Console\Commands;

use App\Event;
use App\Excellence;
use App\Helpers\ExcellenceWinnersHelper;
use App\Queries\SuperOrganiserQuery;
use Illuminate\Console\Command;

class CertificateStats extends Command
{
    protected $signature = 'certificate:stats
                            {--edition=2025 : Target edition year}
                            {--type=excellence : excellence|super-organiser}
                            {--sample=10 : Number of sample user IDs to show for missing/extra}';

    protected $description = 'Show diagnostic counts for certificate backend recipients and processing status';

    public function handle(): int
    {
        $edition = (int) $this->option('edition');
        $typeOption = (string) $this->option('type');
        $sampleSize = max(0, (int) $this->option('sample'));

        $normalizedType = $this->normalizeType($typeOption);
        if ($normalizedType === null) {
            $this->error("Invalid --type value: {$typeOption}. Use 'excellence' or 'super-organiser'.");
            return self::FAILURE;
        }

        $eligibleUserIds = $this->eligibleUserIds($edition, $normalizedType);
        $eligibleUserIds = array_values(array_unique(array_filter(array_map('intval', $eligibleUserIds))));

        $query = Excellence::query()
            ->where('edition', $edition)
            ->where('type', $normalizedType);

        $excellenceRows = $query->count();
        $generated = (clone $query)->whereNotNull('certificate_url')->count();
        $sent = (clone $query)->whereNotNull('notified_at')->count();
        $generationErrors = (clone $query)->whereNotNull('certificate_generation_error')->count();
        $sendErrors = (clone $query)->whereNotNull('certificate_sent_error')->count();
        $pendingGeneration = (clone $query)
            ->where(function ($q) {
                $q->whereNull('certificate_url')->orWhereNotNull('certificate_generation_error');
            })
            ->count();
        $pendingSend = (clone $query)
            ->whereNotNull('certificate_url')
            ->where(function ($q) {
                $q->whereNull('notified_at')->orWhereNotNull('certificate_sent_error');
            })
            ->count();

        $existingUserIds = Excellence::query()
            ->where('edition', $edition)
            ->where('type', $normalizedType)
            ->whereNotNull('user_id')
            ->distinct()
            ->pluck('user_id')
            ->map(static fn ($id) => (int) $id)
            ->toArray();

        $eligibleSet = array_fill_keys($eligibleUserIds, true);
        $existingSet = array_fill_keys($existingUserIds, true);

        $missingUserIds = array_map('intval', array_keys(array_diff_key($eligibleSet, $existingSet)));
        $extraUserIds = array_map('intval', array_keys(array_diff_key($existingSet, $eligibleSet)));

        $this->newLine();
        $this->info("Certificate stats for edition {$edition}, type {$normalizedType}");
        $this->table(
            ['Metric', 'Value'],
            [
                ['Eligible users (source query)', number_format(count($eligibleUserIds))],
                ['Excellence rows (edition + type)', number_format($excellenceRows)],
                ['Distinct user_ids in excellences', number_format(count($existingUserIds))],
                ['Generated (certificate_url set)', number_format($generated)],
                ['Sent (notified_at set)', number_format($sent)],
                ['Generation errors', number_format($generationErrors)],
                ['Send errors', number_format($sendErrors)],
                ['Pending generation', number_format($pendingGeneration)],
                ['Pending send', number_format($pendingSend)],
                ['Missing rows (eligible but no excellence row)', number_format(count($missingUserIds))],
                ['Extra rows (in excellences but not eligible)', number_format(count($extraUserIds))],
            ]
        );

        if ($sampleSize > 0) {
            $this->line('Sample missing user IDs: ' . $this->sampleCsv($missingUserIds, $sampleSize));
            $this->line('Sample extra user IDs: ' . $this->sampleCsv($extraUserIds, $sampleSize));
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

    private function eligibleUserIds(int $edition, string $type): array
    {
        if ($type === 'SuperOrganiser') {
            return array_map('intval', SuperOrganiserQuery::winners($edition));
        }

        $codes = ExcellenceWinnersHelper::query(now()->year($edition), true)
            ->pluck('codeweek_for_all_participation_code')
            ->filter()
            ->unique()
            ->values();

        if ($codes->isEmpty()) {
            return [];
        }

        return Event::query()
            ->whereYear('end_date', '=', $edition)
            ->where('status', 'APPROVED')
            ->whereIn('codeweek_for_all_participation_code', $codes->toArray())
            ->whereNotNull('creator_id')
            ->distinct()
            ->pluck('creator_id')
            ->map(static fn ($id) => (int) $id)
            ->toArray();
    }

    private function sampleCsv(array $ids, int $sampleSize): string
    {
        if (empty($ids)) {
            return '(none)';
        }

        return implode(', ', array_slice(array_map('strval', $ids), 0, $sampleSize));
    }
}
