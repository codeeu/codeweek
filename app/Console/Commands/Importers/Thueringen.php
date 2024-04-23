<?php

namespace App\Console\Commands\Importers;

use App\Helpers\ImporterHelper;
use App\RSSItems\ThueringenRSSItem;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Thueringen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:thueringen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data from Thueringen API';

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
        Log::info('Loading Thueringen API Items in Database');

        $techicalUser = ImporterHelper::getTechnicalUser('thueringen-technical');

        $items = ThueringenRSSItem::whereNull('imported_at')->get();

        foreach ($items as $item) {

            $item->createEvent($techicalUser);
            $item->imported_at = Carbon::now();
            $item->save();
        }

        Log::info('Activities created from Thueringen RSS Feed: '.count($items));

    }
}
