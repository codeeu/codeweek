<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
 *
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
    use HasFactory;

    protected $table = 'countries';
    protected $primaryKey = 'iso';
    public $incrementing = false;

    public $guarded = [];

    public static function withEvents()
    {


        $ttl = 60*60*24;
        $isos = Cache::remember('isos', $ttl, function ()  {
            return DB::table('events')
                ->select(['country_iso'])
                ->where('status', "=", "APPROVED")
                ->groupBy('country_iso')
                ->get()
                ->pluck('country_iso');

        });



        $countries = Country::whereIn('iso',$isos)->get();


        foreach ($countries as $country) {
            $country->translation = __('countries.' . $country->name);
        }

        return $countries->sortBy("translation");

    }

    public static function withCoordinators()
    {

        $ttl = 60*60*24;
        $iso_community = Cache::remember('isos-community', $ttl, function ()  {
            return User::role(['ambassador','leading teacher'])
                ->where("country_iso","<>", "")
                ->join('countries', 'country_iso', '=', 'countries.iso')
                ->groupBy(['country_iso','countries.name'])
                ->select('country_iso as iso', DB::raw('count(*) as total'),'countries.name')
                ->orderBy("countries.name")
                ->get()
                ->pluck('iso');

        });

        $countries = Country::whereIn('iso',$iso_community)->get();


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

        return $countries->sortBy("translation")->values();
    }

    public static function withActualYearEvents()
    {
        $year = request()->input('year', Carbon::now('Europe/Brussels')->year);

        $countries = DB::table('events')
            ->select('country_iso as iso', DB::raw('COUNT(*) as total'))
            ->where('status', '=', 'APPROVED')
            ->whereYear('end_date', '>=', $year)
            ->whereNotNull('geoposition')
            ->groupBy('country_iso')
            ->get();

        $result = $countries->map(function ($row) {
            $country = Country::find($row->iso);
            return [
                'iso' => $row->iso,
                'name' => $country ? __('countries.' . $country->name) : $row->iso,
                'total' => $row->total,
            ];
        })->sortBy('name')->values();

        return $result;
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
