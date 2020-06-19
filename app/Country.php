<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'iso';
    public $incrementing = false;

    public $guarded = [];


    public static function withEvents()
    {

        $isos = DB::table('events')
            ->select(['country_iso'])
            ->where('status', "=", "APPROVED")
            ->groupBy('country_iso')
            ->get()
            ->pluck('country_iso');

        $countries = Country::findMany($isos);

        foreach ($countries as $country) {
            $country->translation = __('countries.' . $country->name);
        }

        return $countries->sortBy("translation");

    }

    public static function translated()
    {
        $countries = Country::all();


        foreach ($countries as $country) {
            $country->translation = __('countries.' . $country->name);
        }

//       dd($countries->sortBy("translation"));
//       return($countries);

        return $countries->sortBy("translation")->values();
    }

    public static function withActualYearEvents()
    {

        $isos = DB::table('events')
            ->select(['country_iso'])
            ->where('status', "=", "APPROVED")
            ->whereYear('end_date', '>=', Carbon::now('Europe/Brussels')->year)
            ->groupBy('country_iso')
            ->get()
            ->pluck('country_iso');

        $countries = Country::findMany($isos)->sortBy('name');

        return $countries;

    }


    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function approvedEvents($year, $operator)
    {
        return $this->hasMany(Event::class)
            ->where('status', '=', 'APPROVED')
            ->whereYear('end_date', $operator,  $year);
    }

}
