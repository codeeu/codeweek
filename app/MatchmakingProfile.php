<?php

namespace App;

use App\Country;
use App\Filters\MatchmakingProfileFilters;
use Illuminate\Database\Eloquent\Model;

class MatchmakingProfile extends Model
{
    protected $table = 'matchmaking_profiles';

    protected $fillable = [
        'type',
        'slug',
        'avatar',
        'email',
        'first_name',
        'last_name',
        'job_title',
        'languages',
        'linkedin',
        'facebook',
        'website',
        'organisation_name',
        'organisation_type',
        'organisation_mission',
        'location',
        'country',
        'support_activities',
        'interested_in_school_collaboration',
        'target_school_types',
        'digital_expertise_areas',
        'time_commitment',
        'can_start_immediately',
        'why_volunteering',
        'format',
        'is_use_resource',
        'want_updates',
        'agree_to_be_contacted_for_feedback',
        'description',
        'start_time',
        'completion_time',
        'email_via_linkedin',
        'get_email_from',
        'avatar_dark',
    ];

    protected $casts = [
        'languages' => 'array',
        'organisation_type' => 'array',
        'support_activities' => 'array',
        'target_school_types' => 'array',
        'digital_expertise_areas' => 'array',
        'time_commitment' => 'array',
        'can_start_immediately' => 'boolean',
        'is_use_resource' => 'boolean',
        'want_updates' => 'boolean',
        'agree_to_be_contacted_for_feedback' => 'boolean',
        'start_time' => 'datetime',
        'completion_time' => 'datetime',
        'email_via_linkedin' => 'boolean',
        'avatar_dark' => 'boolean',
    ];

    // ENUM constants
    public const TYPE_VOLUNTEER = 'volunteer';
    public const TYPE_ORGANISATION = 'organisation';

    public const FORMAT_ONLINE = 'Online';
    public const FORMAT_IN_PERSON = 'In-person';
    public const FORMAT_BOTH = 'Both';

    public const COLLABORATION_YES = 'Yes';
    public const COLLABORATION_NO = 'No';
    public const COLLABORATION_MAYBE = 'Maybe, I would like more details';

    // Static helpers for validation / form use
    public static function getValidTypes(): array
    {
        return [
            self::TYPE_VOLUNTEER,
            self::TYPE_ORGANISATION,
        ];
    }

    public static function getValidFormats(): array
    {
        return [
            self::FORMAT_ONLINE,
            self::FORMAT_IN_PERSON,
            self::FORMAT_BOTH,
        ];
    }

    public static function getValidCollaborationOptions(): array
    {
        return [
            self::COLLABORATION_YES,
            self::COLLABORATION_NO,
            self::COLLABORATION_MAYBE,
        ];
    }

    public static function getValidOrganizationTypeOptions(): array
    {
        return [
            'Academic Institution / Research Organisation',
            'EdTech',
            'Education/Training Provider',
            'INTERNATIONAL CERTIFICATION',
            'Non-Governmental Organisation (NGO)',
            'Preschool',
            'Public Sector Organisation / Government Agency',
        ];
    }

    public static function getUniqueDigitalExpertiseAreas(): array
    {
        return MatchmakingProfile::query()
            ->pluck('digital_expertise_areas')
            ->filter()
            ->flatMap(function ($item) {
                return is_array($item) ? $item : [];
            })
            ->unique()
            ->sort()
            ->values()
            ->all();
    }

    /**
     * Get display name depending on type
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->type === self::TYPE_VOLUNTEER
            ? trim("{$this->first_name} {$this->last_name}")
            : $this->organisation_name;
    }

    public function countryModel()
    {
        return $this->belongsTo(Country::class, 'country', 'iso');
    }

    public function scopeFilter($query, MatchmakingProfileFilters $filters)
    {
        return $filters->apply($query);
    }
}
