<?php

namespace App\Console\Commands;

use App\Event;
use Illuminate\Console\Command;

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

    private $step = 1000;

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        Event::whereNull('deleted_at')->
//            where('id','=',163373)->
//        where('creator_id',153701)->
        where('status', 'APPROVED')->
        whereNull('location_id')->chunkById($this->step, function ($events, $index) {

            $this->reportProgress($index);

            $events->each(function ($event) {
                $event->createLocation();
            });

        });

    }

    protected function reportProgress($index): void
    {
        $from = ($index - 1) * $this->step;
        $to = ($index - 1) * $this->step + $this->step;
        $this->info("Extracting Locations from events {$from} - {$to}");
    }
}
