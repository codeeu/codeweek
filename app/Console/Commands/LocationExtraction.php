<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\MeetAndCodeHelper;
use App\Location;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class LocationExtraction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'location:extraction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extract locations from events and fill the locations table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        Event::
//        where('creator_id',153701)->
        where('status',"=","APPROVED")->
        whereNull('location_id')->chunk(1000, function ($events, $index) {
            $this->reportProgress($index);

            $events->each(function ($event) {
                try {

                    $location = Location::firstOrCreate(
                        [
                            'trimmed_geoposition' => $event->trimmedGeoposition,
                            'user_id' => $event->creator_id,
                        ],
                        [
                            'geoposition' => $event->geoposition,
                            'latitude' => $event->latitude,
                            'longitude' => $event->longitude,
                            'name' => $event->organizer,
                            'location' => $event->location,
                            'country_iso' => $event->country_iso,
                            'event_id' => $event->id,
                            'activity_type' => $event->activity_type,
                            'organizer_type' => $event->organizer_type
                        ]);


                    Log::info($event->trimmedGeoposition);
                    Log::info($event->creator_id);
                    Log::info($location->id);
                    //                    Log::info($location->id);
                    Log::info("=======================");
                    Log::info("=======================");

                    $event->update([
                        'location_id' => $location->id
                    ]);

                } catch (\Exception $exception) {
                    //Log::info($location);
                    Log::info('unique constraint triggered');
                }


            });

        });


    }



    /**
     * @param $index
     */
    protected function reportProgress($index): void
    {
        $from = ($index - 1) * 1000;
        $to = ($index - 1) * 1000 + 1000;
        $this->info("Extracting Locations from events {$from} - {$to}");
    }
}
