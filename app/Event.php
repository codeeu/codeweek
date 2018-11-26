<?php

namespace App;

use App\Filters\EventFilters;
use App\Helpers\EventHelper;
use App\Policies\EventPolicy;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Mail;
use Log;
use Spatie\Activitylog\Traits\LogsActivity;
use Laravel\Nova\Actions\Actionable;

class Event extends Model
{
    use LogsActivity, Actionable;


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
        'last_report_notification_sent_at'


    ];

    protected $policies = [
        'App\Event' => 'App\Policies\EventPolicy',
        Event::class => EventPolicy::class,
    ];


    public function test(){
        return "foo";
    }

    public function getJavascriptData(){
        return $this->only(["geoposition","title","description"]);
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Event " . $this->id . " has been {$eventName}";
    }

    protected static $logFillable = true;


    public function getEventUrlAttribute($url){
        if ($url && strpos($url, "http") !== 0) return "http://" . $url;

        return $url;
    }


    public function path()
    {
        return '/view/' . $this->id . '/' . $this->slug;

    }

    public function picture_path()
    {
        if ($this->picture) {
            return env('AWS_URL') . $this->picture;
        } else {
            return 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/event_default_picture.png';
        }



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
            $events = $events->where('end_date', '>=', Carbon::now('Europe/Brussels')->year);
        }

        return $events->get();
    }

    public function getClosest()
    {
        return EventHelper::getCloseEvents($this->longitude, $this->latitude, $this->id);

    }

    public function notifyAmbassadors()
    {

        //Get the ambassador list based on the event country
        $ambassadors = User::role('ambassador')->where('country_iso', $this->country_iso)->get();
        if ($ambassadors->isEmpty()) {
            Mail::to('info@codeweek.eu')->queue(new \App\Mail\EventCreatedNoAmbassador($this));
        } else {
            //send emails
            foreach ($ambassadors as $ambassador) {
                Mail::to($ambassador->email)->queue(new \App\Mail\EventCreated($this, $ambassador));
            }
        }

    }

    public function approve()
    {


        $data = ['status' => "APPROVED", 'approved_by' => auth()->user()->id];


        $this->update($data);


        if (!empty($this->user_email)) {
            Mail::to($this->user_email)->queue(new \App\Mail\EventApproved($this, $this->owner));
        } else if (!is_null($this->owner) && (!is_null($this->owner->email))) {
            Mail::to($this->owner->email)->queue(new \App\Mail\EventApproved($this, $this->owner));
        }


        return true;
    }

    public function reject(){
        $data = ['status' => "REJECTED", 'approved_by' => auth()->user()->id];

        $this->update($data);
    }



}
