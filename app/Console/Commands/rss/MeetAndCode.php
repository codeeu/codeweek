<?php

namespace App\Console\Commands\rss;

use App\Event;
use App\MeetAndCodeRSSItem;
use Feeds;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function parseDate($date)
    {
        return Carbon::parse($date);
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        dump('Loading MeetAndCode');
        //        $generate = $this->option('generate');
        $force = $this->option('force');

        //        if ($generate){
        //            dump("Generating MeetAndCode File");
        //            $contents = Http::get('https://meet-and-code.org/de/de/events/rss/');
        //            $clean =  str_replace('','',$contents);
        //            Storage::disk('meet-and-code')->put('meet-and-code-clean.xml',$clean);
        //        }
        //
        //        $url = Storage::disk('meet-and-code')->url('meet-and-code-clean.xml');

        $url  = 'https://www.meet-and-code.org/de/de/events/rss/';
        $feed = Feeds::make($url); // <-- not asset($url)

        $new = 0;
        $updated = 0;

        Log::info('Items found in Meet&Code RSS: '.count($feed->get_items()));

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
                            'description' => $RSSitem->description,
                        ]);
                        Log::info($event->id.' has been force updated');
                        $updated++;
                    }

                }

                $line->save();
            }

        }
        Log::info('New items imported from Meet & Code RSS Feed: '.$new);

        if ($force) {
            Log::info('Updated items from Meet & Code RSS Feed: '.$updated);
        }

        Artisan::call('import:meetandcode');

    }

    public function getCustomTag($item, $tag)
        {
            $tags = $item->get_item_tags('', $tag) ?? [];
            return $tags[0]['data'] ?? null;
        }


    public function createEvents()
    {

    }
}
