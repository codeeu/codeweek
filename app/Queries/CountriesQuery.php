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
        $isos = DB::table('events')
            ->select(['country_iso'])
            ->where('activity_type',"=","open-online")
            ->where('status',"<>","REJECTED")
            ->where('highlighted_status',"=",$highlighted_status)
            ->whereNull('deleted_at')
            ->whereDate('start_date', '>=', Carbon::now('Europe/Brussels'))
            ->groupBy('country_iso')
            ->get()
            ->pluck('country_iso')
        ;

        $countries = Country::findMany($isos)->sortBy('name');
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