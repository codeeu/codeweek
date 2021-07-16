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
use Spatie\Activitylog\Traits\LogsActivity;
use Laravel\Nova\Actions\Actionable;

/**
 * App\Event
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $status
 * @property string $title
 * @property string|null $slug
 * @property string $organizer
 * @property string $description
 * @property string $geoposition
 * @property float $latitude
 * @property float $longitude
 * @property string $location
 * @property string $country_iso
 * @property string $start_date
 * @property string $end_date
 * @property string|null $event_url
 * @property string|null $contact_person
 * @property string $user_email
 * @property string|null $picture
 * @property string $pub_date
 * @property string $created
 * @property string $updated
 * @property int $creator_id
 * @property string|null $last_report_notification_sent_at
 * @property int $report_notifications_count
 * @property string|null $name_for_certificate
 * @property int|null $participants_count
 * @property float|null $average_participant_age
 * @property float|null $percentage_of_females
 * @property string|null $codeweek_for_all_participation_code
 * @property string|null $certificate_url
 * @property string|null $reported_at
 * @property string|null $certificate_generated_at
 * @property string|null $organizer_type
 * @property int|null $approved_by
 * @property string|null $activity_type
 * @property string|null $picture_detail
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $playback_url
 * @property string $highlighted_status
 * @property string|null $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Nova\Actions\ActionEvent[] $actions
 * @property-read int|null $actions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Audience[] $audiences
 * @property-read int|null $audiences_count
 * @property-read \App\Country $country
 * @property-read mixed $latest_moderation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Moderation[] $moderations
 * @property-read int|null $moderations_count
 * @property-read \App\Notification|null $notification
 * @property-read \App\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Theme[] $themes
 * @property-read int|null $themes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Event filter(\App\Filters\EventFilters $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Query\Builder|Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereActivityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereAverageParticipantAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCertificateGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCertificateUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCodeweekForAllParticipationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCountryIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereGeoposition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereHighlightedStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLastReportNotificationSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereNameForCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereOrganizer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereOrganizerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereParticipantsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePercentageOfFemales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePictureDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePlaybackUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePubDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereReportNotificationsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereReportedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUserEmail($value)
 * @method static \Illuminate\Database\Query\Builder|Event withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Event withoutTrashed()
 * @mixin \Eloquent
 */
class Event extends Model
{
    use LogsActivity, Actionable, SoftDeletes;


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
        'last_report_notification_sent_at',
        'activity_type',
        'picture_detail',
        'language',


    ];

    protected $policies = [
        'App\Event' => 'App\Policies\EventPolicy',
        Event::class => EventPolicy::class,
    ];

    protected $appends = ['LatestModeration'];


    public function getJavascriptData()
    {
        return $this->only(["geoposition", "title", "description"]);
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Event " . $this->id . " has been {$eventName}";
    }

    protected static $logFillable = true;


    public function getEventUrlAttribute($url)
    {
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
            if (Str::startsWith($this->picture, 'http')) return $this->picture;
            return env('AWS_URL') . $this->picture;
        } else {
            return 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/event_default_picture.png';
        }

    }

    public function picture_detail_path()
    {
        if ($this->picture_detail) {
            return env('AWS_URL') . $this->picture_detail;
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
                Mail::to($ambassador->email)->queue(new \App\Mail\LeadingTeachingActionAdded($this, $ambassador));
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

    public function reject($rejectionText = null)
    {

        $this->moderations()->create([
            'status' => 'REJECTED',
            'message' => $rejectionText,
            'status_by' => auth()->id()
        ]);

        $data = ['status' => "REJECTED", 'approved_by' => auth()->user()->id];

        if (!empty($this->user_email)) {
            Mail::to($this->user_email)->queue(new \App\Mail\EventRejected($this, $this->owner, $rejectionText));
        } else if (!is_null($this->owner) && (!is_null($this->owner->email))) {
            Mail::to($this->owner->email)->queue(new \App\Mail\EventRejected($this, $this->owner, $rejectionText));
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
        if (auth()->user()->can('promote', $this)) {
            if ($this->highlighted_status == "NONE") {
                //Promote
                $this->highlighted_status = "PROMOTED";
                $notification = new Notification();
                $this->notification()->save($notification);
            } else {
                //Cancel Promote
                $this->highlighted_status = "NONE";
                $this->notification()->delete();
            }


            return $this->save();
        }
    }

    public function feature()
    {
        if (auth()->user()->can('feature', $this)) {
            $this->highlighted_status == "FEATURED" ? $this->highlighted_status = "PROMOTED" : $this->highlighted_status = "FEATURED";
            return $this->save();
        }
    }

    public function notification()
    {
        return $this->hasOne('App\Notification', 'event_id', 'id');
    }

    public function relocate(){
        $this->longitude = $this->country->longitude;
        $this->latitude = $this->country->latitude;
        $this->geoposition = $this->country->latitude . "," . $this->country->longitude;
        $this->save();
    }



}
