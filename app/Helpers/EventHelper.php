<?php

namespace App\Helpers;

use App\Event;
use Carbon\Carbon;
use App\User;

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

    public static function getPendindEvents()
    {

        $country_isos_ambassadors = User::role('ambassador')
            ->distinct()
            ->select('country_iso')
            ->where("country_iso","<>", "")
            ->get();

        $countries = [];

        foreach ($country_isos_ambassadors as $country) {
            array_push($countries, $country->country_iso);
        }

        $events = Event::where('status', '=', 'PENDING')
            ->distinct()
            ->select('country_iso')
            ->where('start_date', '>', Carbon::createFromDate(2018, 1, 1))
            ->whereIn('country_iso', $countries)
            ->get();


        return $events;

    }

}