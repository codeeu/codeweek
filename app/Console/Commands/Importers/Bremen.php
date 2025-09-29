<?php

namespace App\Console\Commands\Importers;

use App\Helpers\ImporterHelper;
use App\RSSItems\BremenRSSItem;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Bremen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:bremen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the data from Bremen API';

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
        Log::info('Loading Bremen API Items in Database');

        $techicalUser = ImporterHelper::getTechnicalUser('bremen-technical');
        $items = BremenRSSItem::whereNull('imported_at')->get();

        foreach ($items as $item) {
            try {
                $item->createEvent($techicalUser);
                $item->imported_at = Carbon::now();
                $item->save();

                $this->info(sprintf('UID=%s imported_at=%s', $item->uid, $item->imported_at));
            } catch (\Throwable $e) {
                Log::error('[import:bremen] item failed', ['uid' => $item->uid, 'error' => $e]);
                $this->error('Failed UID='.$item->uid.' -> '.$e->getMessage());
            }
        }

        Log::info('Activities created from RSS Feed: '.count($items));
    }
}
