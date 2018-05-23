<?php

namespace App\Helpers;

use App\Event;
use Carbon\Carbon;

class EventHelper
{

    public static function getCloseEvents($longitude, $latitude, $id = 0)
    {
        //acos is not known with sqlite that is used for testing.
        if (env('DB_CONNECTION') == 'sqlite') {
            return Event::take(4)->get();
        };

        $events = Event::selectRaw('id, title, slug, start_date, description, picture,
        ( 6371 *
         acos( cos( radians(?) ) *
         cos( radians( latitude ) ) *
         cos( radians( longitude ) -
         radians(?) ) +
         sin( radians(?) ) *
         sin( radians( latitude ) ) ) )
         AS distance', [$latitude, $longitude, $latitude])
            ->where('status', '=', 'APPROVED')
            ->where('id', '<>', $id)
            ->where('end_date', '>', Carbon::now())
            ->orderBy('distance')
            ->take(4)
            ->get();

        return $events;

    }

}