<?php

namespace App\Console\Commands\api;

use App\LeipzigRSSItem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

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
            $className = '\App\\' . $city . 'RSSItem';
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
}
