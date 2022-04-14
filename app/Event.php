<?php

namespace App;

use App\Filters\EventFilters;
use App\Helpers\EventHelper;
use App\Policies\EventPolicy;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Log;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Laravel\Nova\Actions\Actionable;

class Event extends Model
{
    use Actionable, SoftDeletes;

    protected $table = 'events';
    protected $fillable = [
        'status',
        'title',
        'slug',
        'organizer',
        'description',
        'geoposition',
        'latitude',
        'longitude',
        'location',
        'country_iso',
        'start_date',
        'end_date',
        'event_url',
        'contact_person',
        'user_email',
        'picture',
        'pub_date',
        'created',
        'updated',
        'creator_id',
        'report_notifications_count',
        'reported_at',
        'name_for_certificate',
        'participants_count',
        'average_participant_age',
        'percentage_of_females',
        'codeweek_for_all_participation_code',
        'name_for_certificate',
        'organizer_type',
        'certificate_url',
        'certificate_generated_at',
        'approved_by',
        'last_report_notification_sent_at',
        'activity_type',
        'picture_detail',
        'language',
        'location_id'
    ];

//    protected $policies = [
//        'App\Event' => 'App\Policies\EventPolicy',
//        Event::class => EventPolicy::class
//    ];

    //protected $appends = ['LatestModeration'];

    public function getJavascriptData()
    {
        return $this->only(['geoposition', 'title', 'description']);
    }


    protected static $logFillable = true;

    public function getEventUrlAttribute($url)
    {
        if ($url && strpos($url, 'http') !== 0) {
            return 'http://' . $url;
        }

        return $url;
    }

    public function path()
    {
        return '/view/' . $this->id . '/' . $this->slug;
    }

    public function imported()
    {
        return Str::contains($this->codeweek_for_all_participation_code, [
            '-hamburg',
            '-bonn',
            '-baden'
        ]);
    }

    public function picture_path()
    {
        if ($this->picture) {
            if (Str::startsWith($this->picture, 'http')) {
                return $this->picture;
            }
            return config('codeweek.aws_url') . $this->picture;
        } else {
            return 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/event_default_picture.png';
        }
    }

    public function picture_detail_path()
    {
        if ($this->picture_detail) {
            return config('codeweek.aws_url') . $this->picture_detail;
        }

        return $this->picture_path();
    }

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_iso', 'iso');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function extractedLocation(){
        return $this->belongsTo('App\Location', 'location_id');
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
        return $this->belongsToMany('App\Tag')->where('name', '<>', '');
    }

    public function get_start_date()
    {
        $dt = Carbon::parse($this->start_date);

        return $dt->toDayDateTimeString();
    }

    public function get_start_date_simple()
    {
        $dt = Carbon::parse($this->start_date);

        return $dt->format('d/m/Y \\- H:i');
    }

    public function scopeFilter($query, EventFilters $filters)
    {
        //Log::info($filters->apply($query));
        return $filters->apply($query);
    }

    public static function getByYear($year)
    {
        $events = Event::where('status', 'like', 'APPROVED')->where(
            'start_date',
            '>',
            Carbon::createFromDate($year, 1, 1)
        );

        if ($year != Carbon::now()->year) {
            $events = $events->where(
                'end_date',
                '<',
                Carbon::createFromDate($year, 12, 31)
            );
        } else {
            $events = $events->where(
                'end_date',
                '>=',
                Carbon::now('Europe/Brussels')->year
            );
        }

        return $events->get();
    }

    public function getClosest()
    {
        return EventHelper::getCloseEvents(
            $this->longitude,
            $this->latitude,
            $this->id
        );
    }

    public function notifyAmbassadors()
    {
        //Get the ambassador list based on the event country
        $ambassadors = User::role('ambassador')
            ->where('country_iso', $this->country_iso)
            ->get();
        if ($ambassadors->isEmpty()) {
            Mail::to('info@codeweek.eu')->queue(
                new \App\Mail\EventCreatedNoAmbassador($this)
            );
        } else {
            //send emails
            foreach ($ambassadors as $ambassador) {
                Mail::to($ambassador->email)->queue(
                    new \App\Mail\EventCreated($this, $ambassador)
                );
            }
        }
    }

    public function approve()
    {
        $data = ['status' => 'APPROVED', 'approved_by' => auth()->user()->id];

        $this->update($data);

        if (!empty($this->user_email)) {
            Mail::to($this->user_email)->queue(
                new \App\Mail\EventApproved($this, $this->owner)
            );
        } elseif (!is_null($this->owner) && !is_null($this->owner->email)) {
            Mail::to($this->owner->email)->queue(
                new \App\Mail\EventApproved($this, $this->owner)
            );
        }

        return true;
    }

    public function reject($rejectionText = null)
    {
        $this->moderations()->create([
            'status' => 'REJECTED',
            'message' => $rejectionText,
            'status_by' => auth()->id()
        ]);

        $data = ['status' => 'REJECTED', 'approved_by' => auth()->user()->id];

        if (!empty($this->user_email)) {
            Mail::to($this->user_email)->queue(
                new \App\Mail\EventRejected($this, $this->owner, $rejectionText)
            );
        } elseif (!is_null($this->owner) && !is_null($this->owner->email)) {
            Mail::to($this->owner->email)->queue(
                new \App\Mail\EventRejected($this, $this->owner, $rejectionText)
            );
        }

        return $this->update($data);
    }

    public function moderations()
    {
        return $this->hasMany('App\Moderation');
    }

    public function getLatestModerationAttribute()
    {
        return optional($this->moderations()->latest('created_at'))->first();
    }

    public function promote()
    {
        if (
            auth()
                ->user()
                ->can('promote', $this)
        ) {
            if ($this->highlighted_status == 'NONE') {
                //Promote
                $this->highlighted_status = 'PROMOTED';
                $notification = new Notification();
                $this->notification()->save($notification);
            } else {
                //Cancel Promote
                $this->highlighted_status = 'NONE';
                $this->notification()->delete();
            }

            return $this->save();
        }
    }

    public function feature()
    {
        if (
            auth()
                ->user()
                ->can('feature', $this)
        ) {
            $this->highlighted_status == 'FEATURED'
                ? ($this->highlighted_status = 'PROMOTED')
                : ($this->highlighted_status = 'FEATURED');
            return $this->save();
        }
    }

    public function notification()
    {
        return $this->hasOne('App\Notification', 'event_id', 'id');
    }

    public function relocate()
    {
        $this->longitude = $this->country->longitude;
        $this->latitude = $this->country->latitude;
        $this->geoposition =
            $this->country->latitude . ',' . $this->country->longitude;
        $this->save();
    }

    public function relocateWithCoordinates($coords)
    {
        if (!is_null($coords)) {
            $this->latitude = $coords['location']['y'];
            $this->longitude = $coords['location']['x'];
            $this->geoposition =
                $coords['location']['y'] . ',' . $coords['location']['x'];
            $this->relocation_status = 'SUCCESS';
        } else {
            $this->relocation_status = 'EMPTY COORDS';
        }

        $this->relocated = true;
        $this->save();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "Event {$this->id} has been {$eventName}");
    }

    public function getTrimmedGeopositionAttribute(){
        return EventHelper::trimGeoposition($this->latitude, $this->longitude);
    }


}
