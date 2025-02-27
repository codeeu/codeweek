<?php

namespace App;

use App\Filters\EventFilters;
use App\Helpers\EventHelper;
use App\Helpers\ImporterHelper;
use App\Policies\EventPolicy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Stevebauman\Purify\Casts\PurifyHtmlOnGet;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        'average_participant_age',
        'participants_count',
        'percentage_of_females',
        'percentage_of_males',
        'percentage_of_other',
        'age_group',
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
        'location_id',
        'leading_teacher_tag',
        'mass_added_for',
        'extracurricular_activity',
        'recurring_event',
        'frequency',
    ];

    //    protected $policies = [
    //        'App\Event' => 'App\Policies\EventPolicy',
    //        Event::class => EventPolicy::class
    //    ];

    //protected $appends = ['LatestModeration'];

    public function getUrlAttribute() {
        if (!empty($this->slug)) {
            return route('view_event', [
                'event' => $this->id,
                'slug' => $this->slug
            ]);
        }

        if (!empty($this->event_url)) {
            return $this->event_url;
        }

        return url('/events');
    }

    public function getPicturePathAttribute() {
        return $this->picture_path();
    }

    public function getJavascriptData()
    {
        return $this->only(['geoposition', 'title', 'description']);
    }

    protected static $logFillable = true;

    protected function casts(): array
    {
        return [
            'description' => PurifyHtmlOnGet::class,
            'title' => PurifyHtmlOnGet::class,
            'location' => PurifyHtmlOnGet::class,
            'language' => PurifyHtmlOnGet::class,
        ];
    }

    public function getEventUrlAttribute($url)
    {
        if ($url && strpos($url, 'http') !== 0) {
            return 'http://'.$url;
        }

        return $url;
    }

    public function path()
    {
        return '/view/'.$this->id.'/'.$this->slug;
    }

    public function imported()
    {
        $germanCities = ImporterHelper::getGermanCities();

        return Str::contains($this->codeweek_for_all_participation_code, $germanCities);
    }

    public function picture_path()
    {
        if ($this->picture) {
            if (Str::startsWith($this->picture, 'http')) {
                return $this->picture;
            }

            return config('codeweek.aws_url').$this->picture;
        } else {
            return 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/event_default_picture.png';
        }
    }

    public function picture_detail_path()
    {
        if ($this->picture_detail) {
            return config('codeweek.aws_url').$this->picture_detail;
        }

        return $this->picture_path();
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(\App\Country::class, 'country_iso', 'iso');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(\App\User::class, 'creator_id');
    }

    public function extractedLocation(): BelongsTo
    {
        return $this->belongsTo(\App\Location::class, 'location_id');
    }

    public function audiences(): BelongsToMany
    {
        return $this->belongsToMany(\App\Audience::class);
    }

    public function themes(): BelongsToMany
    {
        return $this->belongsToMany(\App\Theme::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(\App\Tag::class)->where('name', '<>', '');
    }

    public function leadingTeacher(): BelongsTo
    {
        return $this->belongsTo(\App\User::class, 'leading_teacher_tag', 'tag');
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

        if (! empty($this->user_email)) {
            Mail::to($this->user_email)->queue(
                new \App\Mail\EventApproved($this, $this->owner)
            );
        } elseif (! is_null($this->owner) && ! is_null($this->owner->email)) {
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
            'status_by' => auth()->id(),
        ]);

        $data = ['status' => 'REJECTED', 'approved_by' => auth()->user()->id];

        if (! empty($this->user_email)) {
            Mail::to($this->user_email)->queue(
                new \App\Mail\EventRejected($this, $this->owner, $rejectionText)
            );
        } elseif (! is_null($this->owner) && ! is_null($this->owner->email)) {
            Mail::to($this->owner->email)->queue(
                new \App\Mail\EventRejected($this, $this->owner, $rejectionText)
            );
        }

        return $this->update($data);
    }

    public function moderations(): HasMany
    {
        return $this->hasMany(\App\Moderation::class);
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

    public function notification(): HasOne
    {
        return $this->hasOne(\App\Notification::class, 'event_id', 'id');
    }

    public function relocate()
    {
        $this->longitude = $this->country->longitude;
        $this->latitude = $this->country->latitude;
        $this->geoposition =
            $this->country->latitude.','.$this->country->longitude;
        $this->save();
    }

    public function relocateWithCoordinates($coords)
    {
        if (! is_null($coords)) {
            $this->latitude = $coords['location']['y'];
            $this->longitude = $coords['location']['x'];
            $this->geoposition =
                $coords['location']['y'].','.$coords['location']['x'];
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
            ->setDescriptionForEvent(fn (string $eventName) => "Event {$this->id} has been {$eventName}");
    }

    public function getTrimmedGeopositionAttribute()
    {
        return EventHelper::trimGeoposition($this->latitude, $this->longitude);
    }

    public function createLocation()
    {
        Log::info($this->trimmedGeoposition);
        Log::info($this->creator_id);

        try {
            //            $location = Location::where([
            //                'trimmed_geoposition' => $this->trimmedGeoposition,
            //                'user_id' => $this->creator_id,
            //            ])->first();
            //
            ////            dd($location);

            $location = Location::firstOrCreate(
                [
                    'trimmed_geoposition' => $this->trimmedGeoposition,
                    'user_id' => $this->creator_id,
                ],
                [
                    'geoposition' => $this->geoposition,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'name' => $this->organizer,
                    'location' => $this->location,
                    'country_iso' => $this->country_iso,
                    'event_id' => $this->id,
                    'activity_type' => $this->activity_type,
                    'organizer_type' => $this->organizer_type,
                ]);

            //            dd($location->id);

            //            Log::info($location->id);
            $this->update([
                'location_id' => $location->id,
            ]);
        } catch (\Exception $exception) {
            //Log::info($location);
            \Illuminate\Support\Facades\Log::info('unique constraint triggered');
        }
    }
}
