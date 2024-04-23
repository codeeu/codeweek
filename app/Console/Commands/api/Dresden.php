<?php

namespace App\Console\Commands\api;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class Dresden extends Command
{
    use GermanTraits;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:dresden';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Dresden Events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function parseDate($date)
    {
        return Carbon::parse($date);
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {

        $city = 'Dresden';

        $url = 'https://dresden.codeweek.de/?tx_codeweekevents_api[action]=listForEu&tx_codeweekevents_api[controller]=Api&tx_codeweekevents_api[format]=.json&tx_typoscriptrendering[context]={%22record%22%3A%22pages_1%22%2C%22path%22%3A%22tt_content.list.20.codeweekevents_api%22}&cHash=74bb9d71d62e381ebe95b33c1e197943';
        dump("Loading $city events");

        $json = $this->loadJson($url);

        if (is_null($json)) {
            Log::info("!!! No data in feed from $city API:");

            return 0;
        }

        $this->createRSSItem($json, $city);

        return Artisan::call('import:dresden');

    }

    public function getCustomTag($item, $tag)
    {
        return $item->get_item_tags('', $tag)[0]['data'];

    }
}
