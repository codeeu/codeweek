<?php

namespace App\Console\Commands\rss;


use App\Event;
use App\MeetAndCodeRSSItem;
use Illuminate\Console\Command;
use Feeds;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;


class MeetAndCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:meetandcode {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Events from Meet and Code';

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

        dump("Loading MeetAndCode");
        $force = $this->option('force');

        $feed = Feeds::make('https://meet-and-code.org/de/de/events/rss');
        $new = 0;
        $updated = 0;

        foreach ($feed->get_items() as $item) {
            $RSSitem = new MeetAndCodeRSSItem();

            $RSSitem->title = $item->get_title();
            $RSSitem->description = $item->get_description();
            $RSSitem->link = $item->get_link();
            $RSSitem->pubDate = $this->parseDate($this->getCustomTag($item, 'pubDate'));
            $RSSitem->organisation_mail = $this->getCustomTag($item, 'organisation_mail');
            $RSSitem->school_name = $this->getCustomTag($item, 'school_name');
            $RSSitem->organisation_type = $this->getCustomTag($item, 'organisation_type');
            $RSSitem->activity_type = $this->getCustomTag($item, 'activity_type');
            $RSSitem->country = $this->getCustomTag($item, 'country');
            $RSSitem->address = $this->getCustomTag($item, 'address');
            $RSSitem->lon = $this->getCustomTag($item, 'lon');
            $RSSitem->lat = $this->getCustomTag($item, 'lat');
            $RSSitem->organiser_website = $this->getCustomTag($item, 'organiser_website');
            $RSSitem->organiser_email = $this->getCustomTag($item, 'organiser_email');
            $RSSitem->image_link = $this->getCustomTag($item, 'image_link');
            $RSSitem->start_date = $this->parseDate($this->getCustomTag($item, 'start_date'));
            $RSSitem->end_date = $this->parseDate($this->getCustomTag($item, 'end_date'));


            try {

                $RSSitem->save();


                $new++;

            } catch (\PDOException $exception) {
                if ($exception->getCode() !== '23000') {
                    Log::error($exception->errorInfo);
                }

                //Log::info($item->get_link());

                $line = MeetAndCodeRSSItem::where('link', $item->get_link())->first();

                //Log::info($line);

                if ($RSSitem->start_date < $line->start_date) {
                    $line->start_date = $RSSitem->start_date;
                }

                if ($RSSitem->end_date > $line->end_date) {
                    $line->end_date = $RSSitem->end_date;
                }

                if ($force) {
                    $line->description = $RSSitem->description;

                    $event = Event::where('event_url', $line->link)->first();
                    if ($event && $event->description !== $RSSitem->description) {
                        $event->update([
                            "description" => $RSSitem->description
                        ]);
                        Log::info($event->id . " has been force updated");
                        $updated++;
                    }

                }

                $line->save();
            }


        }
        Log::info("New items imported from Meet & Code RSS Feed: " . $new);

        if ($force) {
            Log::info("Updated items from Meet & Code RSS Feed: " . $updated);
        }


        Artisan::call("import:meetandcode");


    }

    public function getCustomTag($item, $tag)
    {
        return $item->get_item_tags("", $tag)[0]['data'];

    }

    public function createEvents()
    {

    }
}
