<?php

namespace App\Console\Commands;

use App\Helpers\EventHelper;
use App\Helpers\GeolocationHelper;
use Illuminate\Console\Command;

class RelocateCountry extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'relocate:country';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Try to relocate activities that are in the center of the country';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $country = env('RELOCATION_COUNTRY', 'IT');

        //Get all activities in the center of the map for the specified country that have not yet been relocated
        $events = EventHelper::getCenteredNotRelocatedEvents($country);

        foreach ($events as $event) {
            \App\Jobs\RelocateEvent::dispatch($event);
        }
        return 0;
    }
}
