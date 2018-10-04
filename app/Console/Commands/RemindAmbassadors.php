<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

use App\Helpers\AmbassadorHelper;
use App\Helpers\EventHelper;
use Illuminate\Support\Facades\Mail;

class RemindAmbassadors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:ambassadors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        Log::info("Sending email to remind ambassadors");
        $events = EventHelper::getPendindEvents();
        foreach ($events as $event) {
            $ambassadors = AmbassadorHelper::getByCountry($event->country_iso);
            foreach ($ambassadors as $ambassador) {
                Mail::to($ambassador->email)->queue(new \App\Mail\RemindAmbassador($ambassador));
            }
        }
    }
}
