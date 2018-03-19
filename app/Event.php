<?php

namespace App;

use App\Filters\EventFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'status', 'title','slug', 'organizer', 'description',
        'geoposition',
        'location',
        'country',
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


    public function path()
    {
        return '/view/' . $this->id . '/' . $this->slug;
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
}
