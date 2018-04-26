<?php

namespace App;

use App\Filters\EventFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Event extends Model
{
    use LogsActivity;

    protected $table = 'events';
    protected $fillable = [
        'status', 'title', 'slug', 'organizer', 'description',
        'geoposition',
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
        'name_for_certificate'

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
}
