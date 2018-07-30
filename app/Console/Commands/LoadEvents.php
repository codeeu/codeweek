<?php

namespace App\Console\Commands;


use App\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoadEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Log::debug('Load events');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('events')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $old_events = DB::table('api_event')
        ->orderBy('id')
        ->chunk(200, function($events)
        {
            foreach ($events as $old)
            {


                $new = new Event();
                $new->id = $old->id;
                $new->status = $old->status;
                $new->title = $old->title;
                $new->slug = $old->slug;
                $new->organizer = $old->organizer;
                $new->description = $old->description;
                $new->geoposition = $old->geoposition;
                $coords = explode(",",$old->geoposition);
                $new->latitude = $coords[0];
                $new->longitude = $coords[1];

                $new->location = $old->location;
                $new->country_iso = $old->country;
                $new->start_date = $old->start_date;
                $new->end_date = $old->end_date;
                $new->event_url = $old->event_url;
                $new->contact_person = $old->contact_person;
                $new->picture = $old->picture;
                $new->pub_date = $old->pub_date;
                $new->created_at = $old->created;
                $new->created = $old->created;
                $new->updated_at = $old->updated;
                $new->updated = $old->updated;
                $new->creator_id = $old->creator_id;
                $new->last_report_notification_sent_at = $old->last_report_notification_sent_at;
                $new->report_notifications_count = $old->report_notifications_count;
                $new->name_for_certificate = $old->name_for_certificate;
                $new->participants_count = $old->participants_count;
                $new->average_participant_age = $old->average_participant_age;
                $new->percentage_of_females = $old->percentage_of_females;
                $new->codeweek_for_all_participation_code = $old->codeweek_for_all_participation_code;
                //$new->certificate_url = $old->certificate_url;
                $new->reported_at = $old->reported_at;
                $new->certificate_generated_at = $old->certificate_generated_at;
                $new->organizer_type = $old->organizer_type;
                $new->approved_by = $old->approved_by;

                $new->save();
            }
        });


    }
}
