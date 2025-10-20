<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Detect and optionally delete duplicate events (same title, start_date, end_date)
 * that have consecutive IDs and were created within <2 seconds.
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
    protected $description = 'Detect duplicate events (same title, start_date, end_date, consecutive IDs, created <2s apart) and optionally delete them with related pivot data.';

    public function handle(): int
    {
        $shouldDelete = $this->option('delete');

        $this->info(sprintf(
            'Scanning for possible duplicate events... (mode: %s)',
            $shouldDelete ? 'DELETE' : 'DRY-RUN'
        ));

        // --- Detect duplicate event pairs ---
        $duplicates = DB::select("
            SELECT 
                e1.id AS id1,
                e2.id AS id2,
                e1.title,
                e1.start_date,
                e1.end_date,
                TIMESTAMPDIFF(SECOND, e1.created_at, e2.created_at) AS diff_seconds
            FROM events e1
            JOIN events e2 ON e2.id = e1.id + 1
            WHERE e1.title = e2.title
              AND e1.start_date = e2.start_date
              AND e1.end_date = e2.end_date
              AND ABS(TIMESTAMPDIFF(SECOND, e1.created_at, e2.created_at)) < 2
            ORDER BY e1.id
        ");

        if (empty($duplicates)) {
            $this->info('No duplicate events found.');
            return self::SUCCESS;
        }

        $this->info(sprintf('Found %d duplicate pair(s):', count($duplicates)));

        $rows = [];
        foreach ($duplicates as $row) {
            $rows[] = [
                $row->id1,
                $row->id2,
                $row->title,
                $row->start_date,
                $row->end_date,
                $row->diff_seconds . 's',
            ];
        }

        $this->table(['Event ID A', 'Event ID B', 'Title', 'Start', 'End', 'At'], $rows);

        if (!$shouldDelete) {
            $this->newLine();
            $this->info('💡 Use --delete to remove duplicates permanently after review.');
            return self::SUCCESS;
        }

        $confirm = $this->confirm(
            sprintf('Are you sure you want to delete %d duplicate entries (including pivot records)?', count($duplicates))
        );
        if (!$confirm) {
            $this->warn('Aborted. No records deleted.');
            return self::SUCCESS;
        }

        // --- Proceed deletion safely ---
        $toDelete = array_column($duplicates, 'id2');
        $deleted = 0;

        $bar = $this->output->createProgressBar(count($toDelete));
        $bar->start();

        DB::beginTransaction();
        try {
            foreach ($toDelete as $eventId) {
                DB::table('event_tag')->where('event_id', $eventId)->delete();
                DB::table('event_theme')->where('event_id', $eventId)->delete();
                DB::table('audience_event')->where('event_id', $eventId)->delete();

                DB::table('events')->where('id', $eventId)->delete();

                $deleted++;
                $bar->advance();
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            $bar->finish();
            $this->error("\nError occurred: " . $e->getMessage());
            return self::FAILURE;
        }

        $bar->finish();
        $this->newLine(2);
        $this->info(sprintf('Successfully deleted %d duplicate event(s) and related pivot records.', $deleted));

        return self::SUCCESS;
    }
}
