<?php

namespace App\Console\Commands\api;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class Leipzig extends Command
{
    use GermanTraits;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:leipzig {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Leipzig Events';

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

        $city = 'Leipzig';

        $url = 'https://leipzig.codeweek.de/?tx_codeweekevents_api%5Baction%5D=listForEu&tx_codeweekevents_api%5Bcontroller%5D=Api&tx_codeweekevents_api%5Bformat%5D=.json&tx_typoscriptrendering%5Bcontext%5D=%7B%22record%22:%22pages_42%22,%22path%22:%22tt_content.list.20.codeweekevents_api%22%7D&cHash=c5952d04181fb05e7d86ef43efcd7f26';
        dump("Loading $city events");
        $force = $this->option('force');

        $json = $this->loadJson($url);

        if (is_null($json)) {
            Log::info("!!! No data in feed from $city API:");

            return 0;
        }

        $this->createRSSItem($json, $city);

        Artisan::call('import:leipzig');

    }

    public function getCustomTag($item, $tag)
    {
        return $item->get_item_tags('', $tag)[0]['data'];

    }
}
