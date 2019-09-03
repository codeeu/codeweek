<?php

namespace App\Console\Commands\Importers;

use App\Helpers\ImporterHelper;
use Illuminate\Console\Command;
use Feeds;

class MeetAndCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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

        dump("Loading MeetAndCode");

        $techicalUserID = ImporterHelper::getTechnicalUser("meetandcode-technical");

        $feed = Feeds::make('https://meet-and-code.org/de/de/events/rss');
        $data = array(
            'title'        => $feed->get_title(),
            'description'     => $feed->get_description(),
            'items'     => $feed->get_items(),

        );


        foreach ($data['items'] as $item){
            dump($item->get_link());
        }
    }
}
