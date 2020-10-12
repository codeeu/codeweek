<?php

namespace App;

use App\Helpers\MeetAndCodeHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BadenRSSItem extends Model
{

    public function createEvent($technicalUser)
    {

        $event = new Event([
            'status' => "APPROVED",
            'title' => htmlspecialchars_decode($this->title),
            'slug' => Str::slug($this->title),
            'organizer' => $this->organizer,
            'description' => $this->description,
            'organizer_type' => $this->user_type,
            'activity_type' => $this->activity_type,
            'location' => $this->location,
            'event_url' => $this->user_website,
            'contact_person' => $this->user_publicEmail,
            'user_email' => $this->user_email,
            'creator_id' => $technicalUser->id,
            'country_iso' => "DE",
            'picture' => $this->photo,
            "pub_date" => now(),
            "created" => now(),
            "updated" => now(),
            "codeweek_for_all_participation_code" => 'cw20-baden',
            "start_date" => $this->eventStartDate,
            "end_date" => $this->eventEndDate,
            "longitude" => $this->longitude,
            "latitude" => $this->latitude,
            "geoposition" => $this->latitude . "," . $this->longitude,
            "language" => "de"
        ]);

        $event->save();

        //Link Other as theme and audience
        if ($this->audience) {
            $event->audiences()->attach(explode(",",$this->audience));
        }
        if ($this->themes) {
            $event->themes()->attach(explode(",",$this->themes));
        }

        if ($this->tags){
            $tagsArray = [];

            foreach (explode(";", $this->tags) as $item) {
                $tag = Tag::firstOrCreate([
                    "name" => trim($item),
                    "slug" => str_slug(trim($item))
                ]);
                array_push($tagsArray, $tag->id);
            }

            $event->tags()->sync($tagsArray);
        }

    }


}
