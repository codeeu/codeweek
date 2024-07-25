<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 20/04/18
 * Time: 09:36
 */

namespace App\Queries;


use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CountriesQuery
{
    public static function all() {
        return Country::all();
    }

//    public static function withPendingEventsCurrentYear(){
//        $isos = DB::table('events')
//            ->select(['country_iso'])
//            ->where('status',"=","PENDING")
//            ->whereNull('deleted_at')
//            ->whereYear('end_date', '>=', Carbon::now('Europe/Brussels')->year)
//            ->groupBy('country_iso')
//            ->get()
//            ->pluck('country_iso')
//        ;
//
//        $countries = Country::findMany($isos)->sortBy('name');
//        return $countries;
//    }

    public static function withPendingEvents(){
        $countries = DB::table('events')
            ->select('events.country_iso as iso','countries.name', DB::raw('count(id) as total'))
            ->join('countries','events.country_iso','=','countries.iso')
            ->where('status',"=","PENDING")
            ->whereNull('deleted_at')
            ->groupBy('country_iso')
            ->orderBy('countries.name')
            ->get();


        return $countries;
    }

    public static function withOnlineEvents($highlighted_status){

        $countries = DB::table('events')
            ->select('events.country_iso as iso', 'countries.name', DB::raw('count(events.id) as total'), DB::raw('MIN(events.start_date) as start_date'))
            ->join('countries', 'events.country_iso', '=', 'countries.iso')
            ->where('events.status', '=', 'APPROVED')
            ->where('events.highlighted_status', '=', $highlighted_status)
            ->whereNull('events.deleted_at')
            ->where('events.activity_type', 'open-online')
            ->where('events.start_date', '>=', Carbon::now()->subDays(15))
            ->where('events.end_date', '>=', Carbon::now())
            ->groupBy('events.country_iso', 'countries.name')
            ->orderBy('countries.name')
            ->get();


//        $countries = DB::table(DB::raw('(
//        SELECT events.country_iso as iso, countries.name, COUNT(events.id) as total
//        FROM events
//        JOIN countries ON events.country_iso = countries.iso
//        WHERE events.status = "APPROVED"
//        AND events.highlighted_status = ?
//        AND events.deleted_at IS NULL
//        AND events.activity_type = "open-online"
//        AND events.start_date >= ?
//        AND events.end_date >= ?
//        GROUP BY events.country_iso, countries.name
//    ) as sub'))
//            ->setBindings([$highlighted_status, Carbon::now()->subDays(15), Carbon::now()])
//            ->orderBy('sub.name')
//            ->get();



//        return $countries;
//
//
//        $isos = DB::table('events')
////            ->select(['country_iso'])
//            ->select('events.country_iso as country_iso', DB::raw('count(id) as total'))
//            ->where('activity_type',"=","open-online")
//            ->where('status',"<>","REJECTED")
//            ->where('highlighted_status',"=",$highlighted_status)
//            ->whereNull('deleted_at')
//            ->whereDate('start_date', '>=', Carbon::now('Europe/Brussels'))
//            ->groupBy('country_iso')
//            ->get()
//            ->pluck('country_iso')
//        ;
//
//        $countries = Country::findMany($isos)->sortBy('name');
        return $countries;
    }

    public static function getCountryIsoPerName(string $name)

    {

        //Means we sent the country code already. No need to lookup.
        if (strlen($name) < 4) return $name;

        return DB::table('countries')
            ->select(['iso'])
            ->where('name',"=",$name)
            ->first()
            ->iso;
    }

}