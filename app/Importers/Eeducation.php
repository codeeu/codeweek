<?php


namespace App\Importers;


use App\Event;
use App\Helpers\ImporterHelper;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Eeducation implements Importers
{
    private $remote;
    private $creator;

    public function __construct($remote_event)
    {
        $this->remote = $remote_event;
        $this->creator = $this->loadUser();
    }

    public function loadUser()
    {
        return User::firstOrCreate([
            "email" => $this->remote->organizer_email
        ], [
            "firstname" => "",
            "lastname" => "",
            "username" => "",
            "password" => bcrypt(Str::random())
        ]);

    }

    public function getUpdatedTimestamp()
    {
        return Carbon::createFromTimestamp($this->remote->tstamp);
    }

    public function parse()
    {
        dump("parse event inside eeducation");

        $event = new Event([
            'status' => "APPROVED",
            'title' => $this->remote->activity_title,
            'slug' => Str::slug($this->remote->activity_title),
            'organizer' => $this->remote->school_name,
            'description' => $this->remote->activity_description,
            'organizer_type' => $this->remote->organisation_type,
            'location' => $this->remote->address,
            'event_url' => $this->remote->url,
            'user_email' => "",
            'creator_id' => $this->creator->id,
            'country_iso' => $this->remote->country,
            'picture' => null,
            "pub_date" => now(),
            "created" => now(),
            "updated" => now(),
            "codeweek_for_all_participation_code" => null,
            "start_date" => Carbon::parse($this->remote->startdate)->toDateTimeString(),
            "end_date" => Carbon::parse($this->remote->enddate)->toDateTimeString(),
            "geoposition" => $this->remote->lat . "," . $this->remote->lng,
            "longitude" => $this->remote->lng,
            "latitude" => $this->remote->lat
        ]);

        $event->save();

        return $event;

    }


    public function update(Event $event)
    {

        dump('update eeducation');

        $event->title = $this->remote->activity_title;
        $event->slug = Str::slug($this->remote->activity_title);
        $event->description = $this->remote->activity_description;
        $event->organizer_type = $this->remote->organisation_type;
        $event->location = $this->remote->address;
        $event->organizer = $this->remote->school_name;
        $event->event_url = $this->remote->url;
        $event->country_iso = $this->remote->country;
        $event->start_date = Carbon::parse($this->remote->starttime)->addHours(2)->toDateTimeString();
        $event->end_date = Carbon::parse($this->remote->endtime)->addHours(2)->toDateTimeString();
        $event->geoposition = $this->remote->lat . "," . $this->remote->lng;
        $event->longitude = $this->remote->lng;
        $event->latitude = $this->remote->lat;

        $event->save();
        return $event;
    }


}