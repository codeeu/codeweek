<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\ImporterHelper;
use App\Helpers\MeetAndCodeHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MeetAndCodeLinkToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meetandcode:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Meet And Code link users';

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

        $this->info('The command was successful!');
        $technicalUser = ImporterHelper::getTechnicalUser("meetandcode-technical");
        $events = Event::where([
            ["event_url","like","https://meet-and-code.org/%"],
            ["creator_id",$technicalUser->id]
        ])->get();

        $total = 0;
        foreach ($events as $event) {
            $added = MeetAndCodeHelper::linkToUsers($event);
            $total += $added;
        }
        Log::info("{$total} Activities have been linked with the users");


    }
}
