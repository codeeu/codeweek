<?php

namespace App\Services\Support;

use App\Event;
use Illuminate\Database\Eloquent\Builder;

/**
 * Preview or apply Code Week 4 All participation code changes on events.
 */
final class EventParticipationCodeService
{
    private const CODE_PATTERN = '/^cw\d{2}-[A-Za-z0-9]+$/';

    /**
     * @return array<string, mixed>
     */
    public function update(
        string $oldCode,
        string $newCode,
        int $year,
        ?int $month,
        bool $dryRun,
    ): array {
        $tool = 'event_participation_code_update';
        $input = [
            'old_code' => $oldCode,
            'new_code' => $newCode,
            'year' => $year,
            'month' => $month,
            'dry_run' => $dryRun,
        ];

        $oldCode = trim($oldCode);
        $newCode = trim($newCode);

        if (!$this->isValidCode($oldCode) || !$this->isValidCode($newCode)) {
            return SupportJson::fail($tool, $input, 'invalid_participation_code');
        }

        if ($oldCode === $newCode) {
            return SupportJson::fail($tool, $input, 'codes_must_differ');
        }

        if ($year < 2000 || $year > 2100) {
            return SupportJson::fail($tool, $input, 'invalid_year');
        }

        if ($month !== null && ($month < 1 || $month > 12)) {
            return SupportJson::fail($tool, $input, 'invalid_month');
        }

        $query = $this->scopedQuery($oldCode, $year, $month);
        $events = (clone $query)
            ->orderBy('created_at')
            ->get(['id', 'title', 'status', 'created_at', 'codeweek_for_all_participation_code']);

        if ($events->isEmpty()) {
            return SupportJson::fail($tool, $input, 'no_matching_events');
        }

        $preview = $events->map(static fn (Event $event) => [
            'id' => $event->id,
            'title' => $event->title,
            'status' => $event->status,
            'created_at' => $event->created_at?->toDateTimeString(),
            'codeweek_for_all_participation_code' => $event->codeweek_for_all_participation_code,
        ])->values()->all();

        if ($dryRun) {
            return SupportJson::ok($tool, $input, [
                'dry_run' => true,
                'matched_count' => $events->count(),
                'events' => $preview,
                'would_update_to' => $newCode,
            ]);
        }

        $updated = $query->update([
            'codeweek_for_all_participation_code' => $newCode,
            'updated_at' => now(),
        ]);

        return SupportJson::ok($tool, $input, [
            'dry_run' => false,
            'updated_count' => $updated,
            'events' => $preview,
            'new_code' => $newCode,
        ]);
    }

    private function isValidCode(string $code): bool
    {
        return (bool) preg_match(self::CODE_PATTERN, $code);
    }

    /**
     * @return Builder<Event>
     */
    private function scopedQuery(string $oldCode, int $year, ?int $month): Builder
    {
        $query = Event::query()
            ->where('codeweek_for_all_participation_code', $oldCode)
            ->whereYear('created_at', $year);

        if ($month !== null) {
            $query->whereMonth('created_at', $month);
        }

        return $query;
    }
}
