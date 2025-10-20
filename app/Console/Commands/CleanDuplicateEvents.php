<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Detect and optionally delete duplicate event *chains* in 2025
 * (same title, start_date, end_date) created within <2s of each other.
 *
 * Related pivot tables:
 *  - event_tag
 *  - event_theme
 *  - audience_event
 *
 * Options:
 *  --delete : delete duplicates directly from DB (default: dry-run)
 *
 * Usage:
 *  php artisan events:clean-duplicates
 *  php artisan events:clean-duplicates --delete
 */
class CleanDuplicateEvents extends Command
{
    /** @var string */
    protected $signature = 'events:clean-duplicates {--delete : Permanently delete detected duplicates and related records from DB}';

    /** @var string */
    protected $description = 'Detect duplicate event groups in 2025 (same title/start/end, created <2s apart) and optionally delete them with related pivot data.';

    public function handle(): int
    {
        $shouldDelete = $this->option('delete');

        $this->info(sprintf(
            'Scanning for possible duplicate events in 2025... (mode: %s)',
            $shouldDelete ? 'DELETE' : 'DRY-RUN'
        ));

        // --- Detect clusters of events with same title/start/end within 2 seconds ---
        $duplicates = DB::select("
            SELECT 
                e.id,
                e.title,
                e.start_date,
                e.end_date,
                e.created_at,
                LAG(e.created_at) OVER (PARTITION BY e.title, e.start_date, e.end_date ORDER BY e.created_at) AS prev_created
            FROM events e
            WHERE YEAR(e.created_at) = 2025
              AND e.title <> ''
              AND e.start_date IS NOT NULL
              AND e.end_date IS NOT NULL
            ORDER BY e.title, e.start_date, e.created_at
        ");

        $toDelete = [];
        $groups = [];
        $prevTitle = $prevStart = $prevEnd = null;
        $group = [];

        foreach ($duplicates as $row) {
            $diff = null;
            if ($row->prev_created) {
                $diff = abs(strtotime($row->created_at) - strtotime($row->prev_created));
            }

            if (
                $row->title === $prevTitle &&
                $row->start_date === $prevStart &&
                $row->end_date === $prevEnd &&
                $diff !== null && $diff < 2
            ) {
                $group[] = $row->id;
            } else {
                if (count($group) > 1) {
                    $groups[] = $group;
                }
                $group = [$row->id];
            }

            $prevTitle = $row->title;
            $prevStart = $row->start_date;
            $prevEnd = $row->end_date;
        }

        if (count($group) > 1) {
            $groups[] = $group;
        }

        if (empty($groups)) {
            $this->info('No duplicate event groups found in 2025.');
            return self::SUCCESS;
        }

        $this->info(sprintf('Found %d duplicate group(s):', count($groups)));

        $rows = [];
        foreach ($groups as $g) {
            $firstEvent = collect($duplicates)->firstWhere('id', $g[0]);

            $rows[] = [
                implode(', ', $g),
                count($g) . ' items',
                $firstEvent?->title ?? '—',
                $firstEvent?->start_date ?? '—',
                $firstEvent?->end_date ?? '—',
            ];

            $toDelete = array_merge($toDelete, array_slice($g, 1));
        }

        $this->table(
            ['Event IDs (Group)', 'Count', 'Title', 'Start date', 'End date'],
            $rows
        );

        if (!$shouldDelete) {
            $this->newLine();
            $this->info('Use --delete to remove duplicates permanently after review.');
            return self::SUCCESS;
        }

        $confirm = $this->confirm(
            sprintf('Delete %d duplicate event(s) across %d groups (including pivot records)?', count($toDelete), count($groups))
        );
        if (!$confirm) {
            $this->warn('Aborted. No records deleted.');
            return self::SUCCESS;
        }

        $bar = $this->output->createProgressBar(count($toDelete));
        $bar->start();

        DB::beginTransaction();
        try {
            foreach ($toDelete as $eventId) {
                DB::table('event_tag')->where('event_id', $eventId)->delete();
                DB::table('event_theme')->where('event_id', $eventId)->delete();
                DB::table('audience_event')->where('event_id', $eventId)->delete();
                DB::table('events')->where('id', $eventId)->delete();
                $bar->advance();
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $bar->finish();
            $this->error("\nError: " . $e->getMessage());
            return self::FAILURE;
        }

        $bar->finish();
        $this->newLine(2);
        $this->info(sprintf('Deleted %d duplicate event(s) and related pivot records.', count($toDelete)));

        return self::SUCCESS;
    }
}
