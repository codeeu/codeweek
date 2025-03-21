<?php

namespace App\Console\Commands\Importers;

use App\Helpers\ImporterHelper;
use App\RSSItems\LeipzigRSSItem;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Leipzig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:leipzig';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data from Leipzig API';

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
    public function handle(): void
    {
        Log::info('Loading Leipzig API Items in Database');

        $techicalUser = ImporterHelper::getTechnicalUser('leipzig-technical');

        $items = LeipzigRSSItem::whereNull('imported_at')->get(); 

        foreach ($items as $item) {

            $item->createEvent($techicalUser);
            $item->imported_at = Carbon::now();
            $item->save();
        }

        Log::info('Activities created from RSS Feed: '.count($items));

    }
}
