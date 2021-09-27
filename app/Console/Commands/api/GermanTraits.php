<?php

namespace App\Console\Commands\api;

use App\Event;
use App\LeipzigRSSItem;
use App\Tag;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait GermanTraits
{
    /**
     * @param $json
     */
    private function createRSSItem($json, $city): void
    {
        $new = 0;
        $updated = 0;


        foreach ($json as $item) {
            $className = '\App\RSSItems\\' . $city . 'RSSItem';
            $RSSitem = new $className;


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
            $RSSitem->user_type = $item['user']['type']['identifier'] ?? '';
            $RSSitem->user_website = $item['user']['www'];
            $RSSitem->activity_type = $item['type']['identifier'];
            $RSSitem->tags = trim(implode(";", Arr::pluck($item['tags'], 'title')));
            $RSSitem->themes = trim(implode(",", Arr::pluck($item['themes'], 'identifier')));
            $RSSitem->audience = trim(implode(",", Arr::pluck($item['audience'], 'identifier')));


            try {

                //Log::info($RSSitem);
                $RSSitem->save();


                $new++;

            } catch (\PDOException $exception) {

                if ($exception->getCode() !== '23000') {
                    Log::error($exception->errorInfo);
                }

            }

        }
        Log::info("New items imported from $city API: " . $new);


    }

    /**
     * @param $city
     * @return void
     */
    private function createGermanEvent($city): void
    {
        $user = User::where(['email' => $this->user_email])->first();

        if ($user == null) {

            //Create user
            $user = User::create(
                [
                    'email' => $this->user_email,
                    'firstname' => $this->organizer,
                    'lastname' => '',
                    'username' => $this->organizer,
                    "password" => bcrypt(Str::random()),
                ]);

        }

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
            'creator_id' => $user->id,
            'country_iso' => "DE",
            'picture' => $this->photo,
            "pub_date" => now(),
            "created" => now(),
            "updated" => now(),
            "codeweek_for_all_participation_code" => "cw21-$city",
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
            $event->audiences()->attach(explode(",", $this->audience));
        }
        if ($this->themes) {
            $event->themes()->attach(explode(",", $this->themes));
        }

        if ($this->tags) {
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
