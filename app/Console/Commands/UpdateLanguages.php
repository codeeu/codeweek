<?php

namespace App\Console\Commands;

use App\Event;
use App\Helpers\MeetAndCodeHelper;
use Illuminate\Console\Command;

class UpdateLanguages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meetandcode:languages';

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
        $events = Event::where('event_url', 'like', 'https://meet-and-code.org/%')->whereNull('language')->get();

        foreach ($events as $event) {
            MeetAndCodeHelper::detectLanguage($event);
        }

        $this->info('Languages have been updated');

    }
}
