<?php

namespace App\Console\Commands\api;


use App\Event;
use App\HamburgRSSItem;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class Hamburg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:hamburg {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Hamburg Events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    function parseDate($date)
    {
        return Carbon::parse($date);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $url = "https://hamburg.codeweek.de/?tx_codeweekevents_api%5Baction%5D=listForEu&tx_codeweekevents_api%5Bcontroller%5D=Api&tx_codeweekevents_api%5Bformat%5D=.json&tx_typoscriptrendering%5Bcontext%5D=%7B%22record%22:%22pages_42%22,%22path%22:%22tt_content.list.20.codeweekevents_api%22%7D&cHash=c5952d04181fb05e7d86ef43efcd7f26";
        dump("Loading Hamburg events");
        $force = $this->option('force');

        $response = Http::get($url);

        $json = $response->json();



        $new = 0;
        $updated = 0;

        foreach ($json as $item) {

            Log::info($item);

            $RSSitem = new HamburgRSSItem();

            $RSSitem->uid = $item['uid'];
            $RSSitem->title = $item['title'];
            $RSSitem->description = $item['description'];
            $RSSitem->organizer = $item['organizer'];
            $RSSitem->photo = $item['photo'];
            $RSSitem->eventEndDate = $item['eventEndDate'];
            $RSSitem->eventStartDate = $item['eventStartDate'];
            $RSSitem->latitude = $item['latitude'];
            $RSSitem->longitude = $item['longitude'];
            $RSSitem->location = $item['location'];
            $RSSitem->user_company = $item['user']['company'];
            $RSSitem->user_email = $item['user']['email'];
            $RSSitem->user_publicEmail = $item['user']['publicEmail'];
            $RSSitem->user_type = $item['user']['type']['identifier'];
            $RSSitem->user_website = $item['user']['www'];
            $RSSitem->activity_type = $item['type']['identifier'];
            $RSSitem->tags = trim(implode(";",Arr::pluck($item['tags'],'title')));
            $RSSitem->themes = trim(implode(",",Arr::pluck($item['themes'],'identifier')));
            $RSSitem->audience = trim(implode(",",Arr::pluck($item['audience'],'identifier')));


            try {

//                Log::info($RSSitem);
                $RSSitem->save();


                $new++;

            } catch (\PDOException $exception) {

                if ($exception->getCode() !== '23000') {
                    Log::error($exception->errorInfo);
                }

            }

        }
        Log::info("New items imported from Hamburg API: " . $new);

        Artisan::call("import:hamburg");


    }

    public function getCustomTag($item, $tag)
    {
        return $item->get_item_tags("", $tag)[0]['data'];

    }

    public function createEvents()
    {

    }
}
