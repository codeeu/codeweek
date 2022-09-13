<?php

namespace App\Console\Commands\Importers;



use App\Helpers\ImporterHelper;


use App\RSSItems\NordhessenRSSItem;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;


class Nordhessen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:nordhessen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data from Nordhessen API';

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
        Log::info("Loading Nordhessen API Items in Database");

        $techicalUser = ImporterHelper::getTechnicalUser("nordhessen-technical");

        $items = NordhessenRSSItem::whereNull('imported_at')->get();



        foreach ($items as $item){

            $item->createEvent($techicalUser);
            $item->imported_at = Carbon::now();
            $item->save();
        }

        Log::info("Activities created from RSS Feed: " . count($items));


    }
}
