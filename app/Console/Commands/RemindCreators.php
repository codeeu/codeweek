<?php

namespace App\Console\Commands;

use App\Helpers\ReminderHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class RemindCreators extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remind:creators';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind Creators to report their events';

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
        Log::info("Sending email to remind event creators");

        //Get email from creators having at least one event that has less than 3 reminders sent
        $creators = ReminderHelper::getCreatorsWithReportableEvents();

        //Send one email per creator.
        dd(count($creators));

        //Increment the reports count

//        $events = EventHelper::getPendindEvents();
//        foreach ($events as $event) {
//            $ambassadors = AmbassadorHelper::getByCountry($event->country_iso);
//            foreach ($ambassadors as $ambassador) {
//                Mail::to($ambassador->email)->queue(new \App\Mail\RemindAmbassador($ambassador));
//            }
//        }
    }
}
