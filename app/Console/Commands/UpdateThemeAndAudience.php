<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\MeetAndCodeHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class UpdateThemeAndAudience extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meetandcode:themes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Languages of Meet and Code events';

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

            MeetAndCodeHelper::updateThemeAndAudience($event);
        }

        $this->info('Themes and Audiences have been updated');








    }
}
