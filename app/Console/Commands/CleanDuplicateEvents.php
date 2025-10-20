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

        $year = 2025;

        $duplicates = DB::select("
            SELECT 
                e.id,
                e.title,
                e.start_date,
                e.end_date,
                e.created_at,
                e.status
            FROM events e
            WHERE YEAR(e.created_at) = ?
              AND e.title <> ''
              AND e.start_date IS NOT NULL
              AND e.end_date IS NOT NULL
            ORDER BY e.title, e.start_date, e.created_at, e.id
        ", [$year]);

        $toDelete = [];
        $groups = [];
        $group = [];

        $prevTitle = $prevStart = $prevEnd = null;
        $prevCreated = null;

        $byId = [];
        foreach ($duplicates as $r) {
            $byId[$r->id] = $r;
        }

        foreach ($duplicates as $row) {
            $sameKey = ($row->title === $prevTitle && $row->start_date === $prevStart && $row->end_date === $prevEnd);

            if ($sameKey && $prevCreated !== null) {
                $diff = abs(strtotime($row->created_at) - strtotime($prevCreated));
                if ($diff < 2) {
                    $group[] = $row->id;
                } else {
                    if (count($group) > 1) $groups[] = $group;
                    $group = [$row->id];
                }
            } else {
                if (count($group) > 1) $groups[] = $group;
                $group = [$row->id];
            }

            $prevTitle = $row->title;
            $prevStart = $row->start_date;
            $prevEnd = $row->end_date;
            $prevCreated = $row->created_at;
        }

        if (count($group) > 1) $groups[] = $group;

        if (empty($groups)) {
            $this->info("No duplicate event groups found in {$year}.");
            return self::SUCCESS;
        }

        $this->info(sprintf('Found %d duplicate group(s):', count($groups)));

        $rows = [];
        foreach ($groups as $g) {
            $events = array_map(fn($id) => $byId[$id] ?? null, $g);

            usort($events, function ($a, $b) {
                $priority = ['APPROVED' => 1, 'PENDING' => 2, 'REJECTED' => 3];
                $aScore = $priority[$a->status] ?? 4;
                $bScore = $priority[$b->status] ?? 4;
                return $aScore <=> $bScore;
            });

            $keep = $events[0]->id ?? null;
            $deleteIds = array_filter(array_column(array_slice($events, 1), 'id'));

            $first = $events[0] ?? null;
            $rows[] = [
                implode(', ', $g),
                count($g) . ' items',
                $first?->title ?? '—',
                $first?->start_date ?? '—',
                $first?->end_date ?? '—',
                'Keep ID: ' . ($keep ?? '—'),
            ];

            $toDelete = array_merge($toDelete, $deleteIds);
        }

        $this->table(['Event IDs (Group)', 'Count', 'Title', 'Start date', 'End date', 'Keep'], $rows);

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
