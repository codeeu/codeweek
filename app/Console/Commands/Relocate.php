<?php

namespace App\Console\Commands;

use App\Event;
use Illuminate\Console\Command;

class Relocate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'relocate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Relocate Online Events that are positioned at 0,0';

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
     */
    public function handle(): int
    {

        $misplaced_events = Event::where('geoposition', '=', '0,0')->get();

        $updated = 0;
        foreach ($misplaced_events as $event) {
            $event->relocate();
            $updated++;
        }

        if ($updated > 0) {
            $this->info("Relocated {$updated} activities!");
        }

    }
}
