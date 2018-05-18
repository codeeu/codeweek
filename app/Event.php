<?php

namespace App;

use App\Filters\EventFilters;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;

class Event extends Model
{
    use LogsActivity;

    protected $table = 'events';
    protected $fillable = [
        'status', 'title', 'slug', 'organizer', 'description',
        'geoposition', 'latitude', 'longitude',
        'location',
        'country_iso',
        'start_date',
        'end_date',
        'event_url',
        'contact_person',
        'picture',
        'pub_date',
        'created',
        'updated',
        'creator_id',
        'report_notifications_count',
        'name_for_certificate',
        'organizer_type'

    ];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Event " . $this->id . " has been {$eventName}";
    }

    protected static $logFillable = true;


    public function path()
    {
        return '/view/' . $this->id . '/' . $this->slug;

    }

    public function picture_path()
    {

        return $this->picture ? $this->picture : "https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/event_default_picture.png";

    }

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_iso', 'iso');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function audiences()
    {
        return $this->belongsToMany('App\Audience');
    }

    public function themes()
    {
        return $this->belongsToMany('App\Theme');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function get_start_date()
    {
        $dt = Carbon::parse($this->start_date);

        return $dt->toDayDateTimeString();

    }


    public function scopeFilter($query, EventFilters $filters)
    {
        return $filters->apply($query);
    }

    public static function getByYear($year)


    {

        $events = Event::where('status', 'like', 'APPROVED')
            ->where('start_date', '>', Carbon::createFromDate($year, 1, 1));

        if ($year != Carbon::now()->year) {
            $events = $events->where('end_date', '<', Carbon::createFromDate($year, 12, 31));
        } else {
            $events = $events->where('end_date', '>', Carbon::now());
        }

        return $events->get();
    }

    public function getClosest(){
        /*
         SELECT id, title,
        ( 6371 *
         acos( cos( radians(50.8093378) ) *
         cos( radians( latitude ) ) *
         cos( radians( longitude ) -
         radians(4.4088449) ) +
         sin( radians(50.8093378) ) *
         sin( radians( latitude ) ) ) )
         AS distance FROM events
         WHERE status LIKE "APPROVED"
         AND END_DATE > NOW()
         ORDER BY DISTANCE ASC
         LIMIT 5
         */

        $events = Event::selectRaw('id, title, slug, start_date, description, picture,
        ( 6371 *
         acos( cos( radians(?) ) *
         cos( radians( latitude ) ) *
         cos( radians( longitude ) -
         radians(?) ) +
         sin( radians(?) ) *
         sin( radians( latitude ) ) ) )
         AS distance', [$this->latitude,$this->longitude,$this->latitude])

            ->where('status', '=', 'APPROVED')
            ->where('id', '<>', $this->id)
            ->where('END_DATE', '>', Carbon::now())
            ->orderBy('distance')
            ->take(4)
            ->get();

        return $events;
    }
}
