<?php

namespace App\Console\Commands;

use App\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncEventAgesFromAudience extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:sync-ages-from-audience';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backfill the `ages` field in events based on audience_event using AGE_AUDIENCE_MAP';

    /**
     * Mapping from Event::AGES keys to audience IDs (from database seeder)
     * This allows automatic linking between selected age ranges and appropriate audiences.
     * Used for syncing Event.ages with Event.audiences via many-to-many relation.
     */
    public const AGE_AUDIENCE_MAP = [
        'under-5' => [1],                      // Pre-school children
        '6-9'     => [2],                      // Elementary school students
        '10-12'   => [2],                      // Upper primary → still Elementary
        '13-15'   => [3],                      // Lower secondary → High school
        '16-18'   => [3],                      // Upper secondary → High school
        '19-25'   => [4, 5],                   // Graduate & Post graduate students
        'over-25' => [6, 7, 9],                // Employed + Unemployed adults + Teachers
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Syncing event.ages from audience_event...');

        $map = self::AGE_AUDIENCE_MAP;
        
        $audienceToAges = [];
        foreach ($map as $ageKey => $audienceIds) {
            foreach ($audienceIds as $audienceId) {
                $audienceToAges[$audienceId][] = $ageKey;
            }
        }
        
        $links = DB::table('audience_event')
            ->select('event_id', 'audience_id')
            ->get()
            ->groupBy('event_id');

        $updated = 0;

        foreach ($links as $eventId => $group) {
            $ageKeys = collect($group)
                ->flatMap(function ($row) use ($audienceToAges) {
                    return $audienceToAges[$row->audience_id] ?? [];
                })
                ->unique()
                ->values()
                ->all();

            if (!empty($ageKeys)) {
                Event::where('id', $eventId)->update([
                    'ages' => json_encode($ageKeys),
                ]);
                $updated++;
            }
        }

        $this->info("Updated `ages` field for $updated events.");
        return 0;
    }
}
