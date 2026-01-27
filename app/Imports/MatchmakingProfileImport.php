<?php

namespace App\Imports;

use App\MatchmakingProfile;
use App\Country;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class MatchmakingProfileImport extends DefaultValueBinder implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    /**
     * Parse semicolon or comma separated values into array
     */
    protected function parseArray($value): array
    {
        if (is_array($value)) {
            return $value;
        }
        if (empty($value)) {
            return [];
        }
        // Handle semicolon-separated values (common in CSV exports)
        $separator = strpos($value, ';') !== false ? ';' : ',';
        return array_filter(array_map('trim', explode($separator, $value)));
    }

    /**
     * Parse boolean values
     */
    protected function parseBool($value): bool
    {
        if (is_bool($value)) {
            return $value;
        }
        $v = strtolower(trim((string) $value));
        return in_array($v, ['1', 'true', 'yes', 'y'], true);
    }

    /**
     * Parse date values
     */
    protected function parseDate($value): ?Carbon
    {
        if (empty($value)) {
            return null;
        }
        
        if (is_numeric($value)) {
            try {
                return Carbon::instance(Date::excelToDateTimeObject($value));
            } catch (\Exception $e) {
                Log::warning("Failed to parse Excel date: {$value}");
                return null;
            }
        }
        
        try {
            // Try common date formats
            $formats = ['m/d/y H:i:s', 'm/d/Y H:i:s', 'Y-m-d H:i:s', 'd/m/Y H:i:s'];
            foreach ($formats as $format) {
                try {
                    return Carbon::createFromFormat($format, $value);
                } catch (\Exception $e) {
                    continue;
                }
            }
            // Fallback to Carbon's parse
            return Carbon::parse($value);
        } catch (\Exception $e) {
            Log::warning("Failed to parse date: {$value}");
            return null;
        }
    }

    /**
     * Find country by name and return ISO code
     */
    protected function findCountryIso($countryName): ?string
    {
        if (empty($countryName)) {
            return null;
        }

        // Try exact match first
        $country = Country::where('name', $countryName)->first();
        if ($country) {
            return $country->iso;
        }

        // Try case-insensitive match
        $country = Country::whereRaw('LOWER(name) = ?', [mb_strtolower(trim($countryName))])->first();
        if ($country) {
            return $country->iso;
        }

        // Try partial match
        $country = Country::whereRaw('LOWER(name) LIKE ?', ['%' . mb_strtolower(trim($countryName)) . '%'])->first();
        if ($country) {
            return $country->iso;
        }

        Log::warning("Country not found: {$countryName}");
        return null;
    }

    /**
     * Generate slug from organisation name or email
     */
    protected function generateSlug($organisationName, $email): string
    {
        $base = !empty($organisationName) ? $organisationName : $email;
        $slug = Str::slug($base);
        
        // Ensure uniqueness
        $originalSlug = $slug;
        $counter = 1;
        while (MatchmakingProfile::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
    }

    /**
     * Get value from row by trying multiple possible key names
     */
    protected function getRowValue(array $row, array $possibleKeys, $default = null)
    {
        foreach ($possibleKeys as $key) {
            if (isset($row[$key]) && !empty($row[$key])) {
                return $row[$key];
            }
        }
        return $default;
    }

    /**
     * Map a row to a MatchmakingProfile model
     */
    public function model(array $row): ?Model
    {
        // Normalize row keys to handle various CSV header formats
        // Try to get email and organisation name with multiple possible key variations
        $email = $this->getRowValue($row, [
            'email',
            'Email',
            'main_email_address',
            'Main email address',
        ]);
        
        $organisationName = $this->getRowValue($row, [
            'organisation_name',
            'Organisation name',
            'organization_name',
            'Organization name',
        ]);

        // Skip rows without essential data
        if (empty($email) && empty($organisationName)) {
            Log::warning('[MatchmakingProfileImport] Skipping row - missing email and organisation_name', $row);
            return null;
        }

        // Determine type - if organisation_name exists, it's an organisation, otherwise volunteer
        $type = !empty($organisationName) 
            ? MatchmakingProfile::TYPE_ORGANISATION 
            : MatchmakingProfile::TYPE_VOLUNTEER;

        // Generate slug
        $slug = $this->generateSlug(
            $organisationName ?? '',
            $email ?? 'anonymous'
        );

        // Parse organisation type
        $organisationType = [];
        $orgTypeValue = $this->getRowValue($row, [
            'organisation_type',
            'Organisation type',
            'organization_type',
            'Organization type',
        ]);
        if (!empty($orgTypeValue)) {
            $orgType = trim($orgTypeValue);
            // Check if it's a valid organisation type
            $validTypes = MatchmakingProfile::getValidOrganizationTypeOptions();
            if (in_array($orgType, $validTypes)) {
                $organisationType = [$orgType];
            }
        }

        // Parse support activities (semicolon-separated)
        $supportActivities = [];
        $supportActivitiesValue = $this->getRowValue($row, [
            'what_kind_of_activities_or_support_can_you_offer_to_schools_and_educators_select_all_that_apply',
            'What kind of activities or support can you offer to schools and educators? (Select all that apply):',
        ]);
        if (!empty($supportActivitiesValue)) {
            $supportActivities = $this->parseArray($supportActivitiesValue);
        }

        // Parse target school types
        $targetSchoolTypes = [];
        $targetSchoolTypesValue = $this->getRowValue($row, [
            'what_types_of_schools_are_you_most_interested_in_working_with',
            'What types of schools are you most interested in working with?',
        ]);
        if (!empty($targetSchoolTypesValue)) {
            $targetSchoolTypes = $this->parseArray($targetSchoolTypesValue);
        }

        // Parse digital expertise areas
        $digitalExpertiseAreas = [];
        $digitalExpertiseValue = $this->getRowValue($row, [
            'what_areas_of_digital_expertise_does_your_organisation_or_you_specialise_in',
            'What areas of digital expertise does your organisation or you specialise in?',
            'what_areas_of_digital_expertise_does_your_organisation_or_you_specialise_in ',
        ]);
        if (!empty($digitalExpertiseValue)) {
            $digitalExpertiseAreas = $this->parseArray($digitalExpertiseValue);
        }

        // Parse interested in school collaboration
        $interestedInCollaboration = null;
        $collabValue = $this->getRowValue($row, [
            'are_you_interested_in_collaborating_with_schools_to_bring_real_world_expertise_into_the_classroom',
            'Are you interested in collaborating with schools to bring real-world expertise into the classroom?',
        ]);
        if (!empty($collabValue)) {
            $collabValue = trim($collabValue);
            $validOptions = MatchmakingProfile::getValidCollaborationOptions();
            if (in_array($collabValue, $validOptions)) {
                $interestedInCollaboration = $collabValue;
            }
        }

        // Find country ISO
        $countryIso = null;
        $countryValue = $this->getRowValue($row, [
            'country_region_areas_of_operation',
            'Country/Region/Areas of operation:',
            'country',
            'Country',
        ]);
        if (!empty($countryValue)) {
            $countryIso = $this->findCountryIso($countryValue);
        }

        // Parse website - ensure it has protocol
        $website = null;
        $websiteValue = $this->getRowValue($row, [
            'organisation_website',
            'Organisation website',
            'website',
            'Website',
        ]);
        if (!empty($websiteValue)) {
            $website = trim($websiteValue);
            if (!empty($website) && !preg_match('/^https?:\/\//', $website)) {
                $website = 'https://' . $website;
            }
        }

        // Get additional fields
        $organisationMission = $this->getRowValue($row, [
            'want_to_tell_us_more_about_your_organisation',
            'Want to tell us more about your organisation?',
        ]);
        
        $isUseResource = $this->parseBool($this->getRowValue($row, [
            'do_you_give_your_consent_to_use_your_logo_and_display_it_in_the_matchmaking_directory',
            'Do you give your consent to use your logo and display it in the matchmaking directory?',
        ], false));
        
        $wantUpdates = $this->parseBool($this->getRowValue($row, [
            'would_you_like_to_be_part_of_the_wider_eu_code_week_community_and_receive_updates_about_future_activities_and_events',
            'Would you like to be part of the wider EU Code Week community and receive updates about future activities and events?',
        ], false));
        
        $agreeToBeContacted = $this->parseBool($this->getRowValue($row, [
            'by_registering_as_a_digital_volunteer_you_agree_to_being_contacted_later_to_share_feedback_about_your_experience',
            'By registering as a Digital Volunteer, you agree to being contacted later to share feedback about your experience.',
        ], false));
        
        $description = $this->getRowValue($row, [
            'do_you_have_any_additional_information_or_comments_that_could_help_us_better_match_you_with_schools_and_educators',
            'Do you have any additional information or comments that could help us better match you with schools and educators?',
        ]);
        
        $startTime = $this->parseDate($this->getRowValue($row, [
            'start_time',
            'Start time',
        ]));
        
        $completionTime = $this->parseDate($this->getRowValue($row, [
            'completion_time',
            'Completion time',
        ]));

        // Build the profile data
        $profileData = [
            'type' => $type,
            'slug' => $slug,
            'email' => $email,
            'organisation_name' => $organisationName,
            'organisation_type' => $organisationType,
            'organisation_mission' => $organisationMission,
            'website' => $website,
            'country' => $countryIso,
            'support_activities' => $supportActivities,
            'interested_in_school_collaboration' => $interestedInCollaboration,
            'target_school_types' => $targetSchoolTypes,
            'digital_expertise_areas' => $digitalExpertiseAreas,
            'is_use_resource' => $isUseResource,
            'want_updates' => $wantUpdates,
            'agree_to_be_contacted_for_feedback' => $agreeToBeContacted,
            'description' => $description,
            'start_time' => $startTime,
            'completion_time' => $completionTime,
        ];

        // Remove null values to use database defaults
        $profileData = array_filter($profileData, function ($value) {
            return $value !== null;
        });

        try {
            $profile = new MatchmakingProfile($profileData);
            $profile->save();
            
            Log::info('[MatchmakingProfileImport] Created profile', [
                'id' => $profile->id,
                'slug' => $profile->slug,
                'email' => $profile->email,
            ]);
            
            return $profile;
        } catch (\Exception $e) {
            Log::error('[MatchmakingProfileImport] Failed to create profile', [
                'error' => $e->getMessage(),
                'row' => $row,
            ]);
            return null;
        }
    }
}
