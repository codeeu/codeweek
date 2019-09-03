<?php


namespace App\Importers;


use App\Event;
use App\Helpers\ImporterHelper;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Eeducation
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
        //return ImporterHelper::getTechnicalUser("eeducation-technical");

        return User::firstOrCreate([
            "email" => $this->remote->organizer_email
        ],[
            "firstname" => "",
            "lastname" => "",
            "username" => "",
            "password" => bcrypt(Str::random())
        ]);

    }

    public function parse()
    {
        dump("parse event inside eeducation");

        $this->extract();

    }

    private function extract()
    {

        $event = new Event([
            'status' => "APPROVED",
            'title' => $this->remote->activity_title,
            'slug' => Str::slug($this->remote->activity_title),
            'organizer' => "",
            'description' => $this->remote->activity_description,
            'organizer_type' => $this->remote->organisation_type,
            'location' => $this->remote->address,
            'event_url' => null,
            'user_email' => "",
            'creator_id' => $this->creator->id,
            'country_iso' => $this->remote->country,
            'picture' => null,
            "pub_date" => now(),
            "created" => now(),
            "updated" => now(),
            "codeweek_for_all_participation_code" => null,
            "start_date" => Carbon::parse($this->remote->starttime)->toDateTimeString(),
            "end_date" => Carbon::parse($this->remote->endtime)->toDateTimeString(),
            "geoposition" => $this->remote->lat . "," . $this->remote->lng,
            "longitude" => $this->remote->lng,
            "latitude" => $this->remote->lat
        ]);

        $event->save();


    }
}