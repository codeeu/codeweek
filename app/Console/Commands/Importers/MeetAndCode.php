<?php

namespace App\Console\Commands\Importers;

use App\Helpers\ImporterHelper;

use App\HamburgRSSItem;
use App\Helpers\MeetAndCodeHelper;
use App\MeetAndCodeRSSItem;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;


class MeetAndCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:meetandcode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data from MeetAndCode RSS Feed';

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
        Log::info("Loading Meet and Code RSS Items in Database");

        $techicalUser = ImporterHelper::getTechnicalUser("meetandcode-technical");
        $items = MeetAndCodeRSSItem::whereNull('imported_at')->get();



        foreach ($items as $item){
            $event = $item->createEvent($techicalUser);
            $item->imported_at = Carbon::now();
            //TODO: check for updating the event if it already exists
            $item->save();
            MeetAndCodeHelper::linkToUsers($event);

        }

        Log::info("Activities created from RSS Feed: " . count($items));

        dd('done importing events');


    }
}
