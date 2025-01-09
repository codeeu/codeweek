<?php

namespace App\Console\Commands\Importers;

use App\Helpers\ImporterHelper;
use App\RSSItems\BayernRSSItem;
use App\RSSItems\NiedersachsenRSSItem;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Niedersachsen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:niedersachsen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data from Niedersachsen API';

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
        Log::info('Loading Niedersachsen API Items in Database');

        $technicalUser = ImporterHelper::getTechnicalUser('niedersachsen-technical');

        $items = NiedersachsenRSSItem::all();

        foreach ($items as $item) {

            $item->createEvent($technicalUser);
            $item->imported_at = Carbon::now();
            $item->save();
        }

        Log::info('Activities created from RSS Feed: '.count($items));

    }
}
