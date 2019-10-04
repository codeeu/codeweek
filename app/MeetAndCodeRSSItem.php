<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MeetAndCodeRSSItem extends Model
{

    public function getCounryIso()
    {

        switch ($this->country) {
            case 'North Macedonia':
                return 'MK';
            case 'Italia':
                return 'IT';
            case 'Bosnia&Herzegovina':
                return 'BA';
            default:
                return Country::where('name', 'like', $this->country)->first()->iso;
        }

    }

    public function createEvent($technicalUser)
    {

        $event = new Event([
            'status' => "APPROVED",
            'title' => htmlspecialchars_decode($this->title),
            'slug' => Str::slug($this->title),
            'organizer' => $this->school_name,
            'description' => $this->description,
            'organizer_type' => $this->mapOrganisationTypes($this->organisation_type),
            'activity_type' => $this->mapActivityTypes($this->activity_type),
            'location' => $this->address,
            'event_url' => $this->link,
            'user_email' => $this->organiser_email,
            'creator_id' => $technicalUser->id,
            'country_iso' => $this->getCounryIso(),
            'picture' => $this->image_link,
            "pub_date" => now(),
            "created" => now(),
            "updated" => now(),
            "codeweek_for_all_participation_code" => 'cw19-meetcode',
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            //"geoposition" => $this->remote->lat . "," . $this->remote->lng,
            //"longitude" => $this->remote->lng,
            //"latitude" => $this->remote->lat
        ]);

        $event->save();

    }

    private function mapOrganisationTypes($organisation_type)
    {
        switch ($organisation_type) {
            case "Non-Profit Organisation":
                return "non profit";
            default:
                return "other";
        }


    }

    private function mapActivityTypes($activity_type)
    {
        switch ($activity_type) {
            case "offline and open":
                return "open-in-person";
            default:
                return "other";
        }


    }
}
