<?php

namespace App\Console\Commands\api;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class Bayern extends Command
{
    use GermanTraits;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:bayern {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Bayern Events';

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
    public function handle()
    {

        $city = 'Bayern';

        $url = 'https://bayern.codeweek.de/?tx_codeweekevents_api%5baction%5d=listForEu&tx_codeweekevents_api%5bcontroller%5d=Api&tx_codeweekevents_api%5bformat%5d=.json&tx_typoscriptrendering%5bcontext%5d=%7b%22record%22%3A%22pages_1%22%2C%22path%22%3A%22tt_content.list.20.codeweekevents_api%22%7d&cHash=74bb9d71d62e381ebe95b33c1e197943';
        dump("Loading $city events");
        $force = $this->option('force');

        $json = $this->loadJson($url);

        if (is_null($json)) {
            Log::info("!!! No data in feed from $city API:");

            return 0;
        }

        $this->createRSSItem($json, $city);

        Artisan::call('import:bayern');

    }

    public function getCustomTag($item, $tag)
    {
        return $item->get_item_tags('', $tag)[0]['data'];

    }
}
