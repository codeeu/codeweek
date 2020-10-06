<?php

namespace App\Console\Commands\rss;


use App\Event;
use App\HamburgRSSItem;
use Illuminate\Console\Command;
use Feeds;
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

        dump("Loading Hamburg events");
        $response = Http::get('https://codeweek.t3.digitalnoise.de/?tx_codeweekevents_api[action]=listForEu&tx_codeweekevents_api[controller]=Api&tx_codeweekevents_api[format]=.json&tx_typoscriptrendering[context]=%7B%22record%22:%22pages_42%22,%22path%22:%22tt_content.list.20.codeweekevents_api%22%7D&cHash=c5952d04181fb05e7d86ef43efcd7f26');

        $json = $response->json();



        $new = 0;
        $updated = 0;

        foreach ($json as $item) {
            $RSSitem = new HamburgRSSItem();

            Log::info($item);

            $RSSitem->title = $item['title'];
            $RSSitem->description = $item['description'];
            $RSSitem->organisation_type = $item['user']['type']['identifier'];
//            $RSSitem->activity_type = $this->type->identifier;
//            $RSSitem->country = "DE";
//            $RSSitem->address = $this->location;
//            $RSSitem->lon = $this->longitude;
//            $RSSitem->lat = $this->latitude;
//            $RSSitem->organiser_website = $this->user->www;
//            $RSSitem->organiser_email = $this->user->email;
//            $RSSitem->image_link = $this->photo;
//            $RSSitem->start_date = $this->eventStartDate;
//            $RSSitem->end_date = $this->eventEndDate;


            try {

                $RSSitem->save();


                $new++;

            } catch (\PDOException $exception) {
                if ($exception->getCode() !== '23000') {
                    Log::error($exception->errorInfo);
                }

                //Log::info($item->get_link());
//
//                $line = HamburgRSSItem::where('link', $item->get_link())->first();
//
//                //Log::info($line);
//
//                if ($RSSitem->start_date < $line->start_date) {
//                    $line->start_date = $RSSitem->start_date;
//                }
//
//                if ($RSSitem->end_date > $line->end_date) {
//                    $line->end_date = $RSSitem->end_date;
//                }
//
//                if ($force) {
//                    $line->description = $RSSitem->description;
//
//                    $event = Event::where('event_url', $line->link)->first();
//                    if ($event && $event->description !== $RSSitem->description) {
//                        $event->update([
//                            "description" => $RSSitem->description
//                        ]);
//                        Log::info($event->id . " has been force updated");
//                        $updated++;
//                    }
//
//                }
//
//                $line->save();
            }


        }
        Log::info("New items imported from Hamburg API: " . $new);

//        if ($force) {
//            Log::info("Updated items from Hamburg API: " . $updated);
//        }


//        Artisan::call("import:meetandcode");


    }

    public function getCustomTag($item, $tag)
    {
        return $item->get_item_tags("", $tag)[0]['data'];

    }

    public function createEvents()
    {

    }
}
