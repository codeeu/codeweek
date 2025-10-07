<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\GeolocationHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Re-geocode and fix NON "open-online" events that have a specific bad geoposition string.
 *
 * Finds events by EXACT geoposition match only, then re-geocodes from textual `location`
 * and updates latitude, longitude, and geoposition.
 *
 * Options:
 *  --dry-run     : simulate only, no DB writes.
 *  --limit=1000  : optional hard cap on processed rows.
 *
 * Usage:
 *  php artisan events:fix-non-online-centroid --dry-run
 *  php artisan events:fix-non-online-centroid --limit=500
 */
class FixNonOnlineCentroidEvents extends Command
{
    /** @var string */
    protected $signature = 'events:fix-non-online-centroid {--dry-run} {--limit=0}';

    /** @var string */
    protected $description = 'Fix non-online events saved with a known bad geoposition by re-geocoding from the textual location';

    /** The exact bad geoposition string to match. */
    private const BAD_GEO = '51.10698181,10.38578051';

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');
        $limit  = (int)  $this->option('limit');

        $this->info(sprintf(
            'Starting NON-ONLINE fix (dry-run: %s, limit: %s, match geoposition: %s)',
            $dryRun ? 'YES' : 'NO',
            $limit > 0 ? $limit : '∞',
            self::BAD_GEO
        ));

        $query = Event::query()
            ->where('activity_type', '!=', 'open-online')
            ->whereNotNull('location')
            ->whereRaw("NULLIF(TRIM(location), '') IS NOT NULL")
            ->where('location', '<>', ',')
            ->where('geoposition', self::BAD_GEO)
            ->orderBy('id');

        $total = (clone $query)->count();
        if ($total === 0) {
            $this->info('No matching events found. Nothing to do.');
            return self::SUCCESS;
        }

        $this->info("Found {$total} candidate event(s).");
        $toProcess = ($limit > 0) ? min($limit, $total) : $total;

        $bar = $this->output->createProgressBar($toProcess);
        $bar->start();

        $summary = [
            'processed' => 0,
            'updated' => 0,
            'no_candidate' => 0,
            'errors' => 0,
        ];

        $rows = [];

        try {
            $query->chunkById(100, function ($events) use (&$summary, $dryRun, $bar, &$rows, $toProcess) {
                /** @var Event $event */
                foreach ($events as $event) {
                    if ($summary['processed'] >= $toProcess) {
                        return false; // stop chunking
                    }

                    $summary['processed']++;

                    $loc    = trim((string) $event->location);
                    $oldGeo = $event->geoposition;

                    try {
                        $candidate = GeolocationHelper::getCoordinates($loc);

                        if (
                            empty($candidate)
                            || empty($candidate['location']['y'])
                            || empty($candidate['location']['x'])
                        ) {
                            $summary['no_candidate']++;
                            $rows[] = [$event->id, $loc, $oldGeo, '—', '—', 'NO_CANDIDATE'];
                            $bar->advance();
                            continue;
                        }

                        $newLat = (float) $candidate['location']['y'];
                        $newLng = (float) $candidate['location']['x'];
                        $newGeo = sprintf('%F,%F', $newLat, $newLng);

                        if ($dryRun) {
                            $summary['updated']++;
                            $rows[] = [$event->id, $loc, $oldGeo, $newLat, $newLng, 'WOULD_UPDATE'];
                            $bar->advance();
                            continue;
                        }

                        DB::transaction(function () use ($event, $newLat, $newLng, $newGeo) {
                            $event->latitude    = $newLat;
                            $event->longitude   = $newLng;
                            $event->geoposition = $newGeo;
                            $event->save();
                        });

                        $summary['updated']++;
                        $rows[] = [$event->id, $loc, $oldGeo, $newLat, $newLng, 'UPDATED'];
                    } catch (\Throwable $e) {
                        $summary['errors']++;
                        Log::error('FixNonOnlineCentroidEvents error', [
                            'event_id' => $event->id,
                            'location' => $loc,
                            'exception' => $e->getMessage(),
                        ]);
                        $rows[] = [$event->id, $loc, $oldGeo, '—', '—', 'ERROR: '.$e->getMessage()];
                    } finally {
                        $bar->advance();
                    }
                }
            });
        } catch (\Throwable $e) {
            $bar->finish();
            $this->error('Aborted due to an unexpected error: '.$e->getMessage());
            Log::error('FixNonOnlineCentroidEvents fatal', ['exception' => $e]);
            return self::FAILURE;
        }

        $bar->finish();
        $this->newLine(2);

        $this->info('Summary:');
        $this->line(sprintf(
            'Processed: %d | Updated: %d | No candidate: %d | Errors: %d',
            $summary['processed'],
            $summary['updated'],
            $summary['no_candidate'],
            $summary['errors']
        ));

        $this->table(
            ['Event ID', 'Location (text)', 'Old geoposition', 'New lat', 'New lng', 'Result'],
            $rows
        );

        return self::SUCCESS;
    }
}
