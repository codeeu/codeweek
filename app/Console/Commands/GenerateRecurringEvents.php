<?php

namespace App\Console\Commands;

use App\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Generate recurring events based on `recurring_event` setting.
 *
 * Duplicates APPROVED events whose recurring_event is in ['daily','weekly','monthly']
 * and whose next occurrence does not exceed end_date.
 *
 * Clones event data and related pivot tables (themes, tags, audiences).
 * Stores reference in `source_ref` as "parent:{event_id}" for traceability.
 *
 * Options:
 *  --dry-run : simulate generation without DB writes.
 *
 * Usage:
 *  php artisan events:generate-recurring
 *  php artisan events:generate-recurring --dry-run
 */
class GenerateRecurringEvents extends Command
{
    protected $signature = 'events:generate-recurring {--dry-run : Simulate without saving any data}';

    protected $description = 'Generate next occurrences for recurring events (daily, weekly, monthly)';

    public function handle(): int
    {
        $dryRun = $this->option('dry-run');

        $this->info(sprintf('Starting recurring event generation (dry-run: %s)', $dryRun ? 'YES' : 'NO'));

        $now = Carbon::now();

        // Only consider APPROVED events not yet ended
        $events = Event::query()
            ->where('status', 'APPROVED')
            ->whereIn('recurring_event', Event::RECURRING_EVENTS)
            ->where('end_date', '>=', $now)
            ->orderBy('start_date')
            ->get();

        if ($events->isEmpty()) {
            $this->info('No eligible recurring events found.');
            return self::SUCCESS;
        }

        $this->info(sprintf('Found %d base recurring event(s)', $events->count()));

        $created = 0;
        $bar = $this->output->createProgressBar($events->count());
        $bar->start();

        foreach ($events as $event) {
            try {
                $nextStart = $this->getNextDate($event->start_date, $event->recurring_event);

                // Skip if next start exceeds event's end_date
                if ($nextStart->gt($event->end_date)) {
                    $bar->advance();
                    continue;
                }

                // Avoid duplicates: check for same parent + same next date
                $exists = Event::query()
                    ->where('source_ref', 'parent:' . $event->id)
                    ->whereDate('start_date', $nextStart->toDateString())
                    ->exists();

                if ($exists) {
                    $bar->advance();
                    continue;
                }

                // Clone event data
                $newEventData = $event->replicate([
                    'id', 'created_at', 'updated_at'
                ])->toArray();

                $durationSeconds = Carbon::parse($event->end_date)->diffInSeconds(Carbon::parse($event->start_date));

                $newEventData['start_date'] = $nextStart;
                $newEventData['end_date'] = $nextStart->copy()->addSeconds($durationSeconds);
                $newEventData['source_ref'] = 'parent:' . $event->id;
                $newEventData['status'] = $event->status;

                if ($dryRun) {
                    $this->line("\nWould create event for '{$event->title}' on {$nextStart->toDateTimeString()}");
                } else {
                    DB::transaction(function () use ($event, $newEventData) {
                        $newEvent = Event::create($newEventData);

                        // Clone relationships
                        $newEvent->themes()->sync($event->themes->pluck('id')->toArray());
                        $newEvent->tags()->sync($event->tags->pluck('id')->toArray());
                        $newEvent->audiences()->sync($event->audiences->pluck('id')->toArray());
                    });

                    $created++;
                }
            } catch (\Throwable $e) {
                Log::error('Recurring generation error', [
                    'event_id' => $event->id,
                    'message' => $e->getMessage(),
                ]);
            } finally {
                $bar->advance();
            }
        }

        $bar->finish();
        $this->newLine(2);
        $this->info(sprintf('Recurring generation completed. %d new event(s) created.', $created));

        return self::SUCCESS;
    }

    /**
     * Determine the next valid date for the recurrence type relative to "now".
     */
    private function getNextDate(Carbon $startDate, string $recurrence): Carbon
    {
        $next = $startDate->copy();
        $now = Carbon::now();

        while ($next->lte($now)) {
            switch ($recurrence) {
                case 'daily':
                    $next->addDay();
                    break;
                case 'weekly':
                    $next->addWeek();
                    break;
                case 'monthly':
                    $next->addMonth();
                    break;
            }
        }

        return $next;
    }
}
