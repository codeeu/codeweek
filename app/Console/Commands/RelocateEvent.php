<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\GeolocationHelper;
use Illuminate\Console\Command;

class RelocateEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'relocate:event {eventId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Relocate Event';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $eventId = strtoupper($this->argument('eventId'));

        $event = Event::firstWhere('id', $eventId);
        $coords = GeolocationHelper::getCoordinates($event->location);

        $event->relocateWithCoordinates($coords);

        return 1;
    }
}
