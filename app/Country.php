<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

/**
 * App\Country
 *
 * @property string $iso
 * @property string $parent
 * @property string $name
 * @property int|null $population
 * @property string $continent
 * @property string $facebook
 * @property string $website
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float|null $longitude
 * @property float|null $latitude
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereContinent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country wherePopulation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereWebsite($value)
 * @mixin \Eloquent
 */
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
