<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\MeetAndCodeHelper;
use Illuminate\Console\Command;

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
        $events = Event::where("event_url","like","https://meet-and-code.org/%")->get();

        foreach ($events as $event) {
            MeetAndCodeHelper::linkToUsers($event);
        }

        $this->info('Users have been linked');
    }
}
