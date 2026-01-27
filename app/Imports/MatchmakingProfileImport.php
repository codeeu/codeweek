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
     * Extract country name from potentially complex location strings
     * Handles cases like "Fier, Albamia", "Durres/Albania/ Albania", "Belgium/Brussels/..."
     */
    protected function extractCountryName($locationString): string
    {
        $locationString = str_replace("\xc2\xa0", ' ', $locationString);
        $locationString = trim($locationString);
        $locationString = trim($locationString, "\"' ");
        $locationString = preg_replace('/\s+/', ' ', $locationString);
        
        // Common country names to look for
        $countryNames = [
            'Albania', 'Andorra', 'Armenia', 'Austria', 'Azerbaijan', 'Belarus', 'Belgium',
            'Bosnia', 'Bulgaria', 'Croatia', 'Cyprus', 'Czech', 'Denmark', 'Estonia',
            'Finland', 'France', 'Georgia', 'Germany', 'Greece', 'Hungary', 'Iceland',
            'Ireland', 'Italy', 'Latvia', 'Liechtenstein', 'Lithuania', 'Luxembourg',
            'Malta', 'Moldova', 'Monaco', 'Montenegro', 'Netherlands', 'North Macedonia',
            'Norway', 'Poland', 'Portugal', 'Romania', 'Russia', 'San Marino', 'Serbia',
            'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Switzerland', 'Turkey', 'Türkiye',
            'Ukraine', 'United Kingdom', 'UK', 'Vatican',
        ];
        
        // Try to find a country name in the string
        foreach ($countryNames as $country) {
            if (stripos($locationString, $country) !== false) {
                return $country;
            }
        }
        
        // If no country found, try splitting by common separators and check each part
        $parts = preg_split('/[,\/;|]/', $locationString);
        foreach ($parts as $part) {
            $part = trim($part);
            foreach ($countryNames as $country) {
                if (stripos($part, $country) !== false) {
                    return $country;
                }
            }
        }
        
        // Try taking the last non-empty part (often the country is last)
        $parts = array_filter(array_map('trim', preg_split('/[,\/;|]/', $locationString)));
        if (!empty($parts)) {
            return trim(end($parts));
        }

        // If still no match, return the original string (trimmed)
        return trim($locationString);
    }

    /**
     * Find country by name and return ISO code
     */
    protected function findCountryIso($countryName): ?string
    {
        if (empty($countryName)) {
            return null;
        }

        $trimmedName = trim($countryName);
        $lowerName = mb_strtolower($trimmedName);

        // If already an ISO code
        if (strlen($trimmedName) === 2) {
            $iso = strtoupper($trimmedName);
            $country = Country::where('iso', $iso)->first();
            if ($country) {
                Log::info("Country found (iso): {$trimmedName} -> {$country->iso}");
                return $country->iso;
            }
        }
        
        // Try exact match first
        $country = Country::where('name', $trimmedName)->first();
        if ($country) {
            Log::info("Country found (exact match): {$trimmedName} -> {$country->iso}");
            return $country->iso;
        }

        // Try case-insensitive match
        $country = Country::whereRaw('LOWER(TRIM(name)) = ?', [$lowerName])->first();
        if ($country) {
            Log::info("Country found (case-insensitive): {$trimmedName} -> {$country->iso}");
            return $country->iso;
        }

        // Try partial match (contains)
        $country = Country::whereRaw('LOWER(TRIM(name)) LIKE ?', ['%' . $lowerName . '%'])->first();
        if ($country) {
            Log::info("Country found (partial match): {$trimmedName} -> {$country->iso}");
            return $country->iso;
        }

        // Try reverse partial match (country name contains search term)
        $country = Country::whereRaw('? LIKE CONCAT(\'%\', LOWER(TRIM(name)), \'%\')', [$lowerName])->first();
        if ($country) {
            Log::info("Country found (reverse partial): {$trimmedName} -> {$country->iso}");
            return $country->iso;
        }

        // Common country name variations/mappings
        $countryMappings = [
            'italy' => 'IT',
            'italia' => 'IT',
            'spain' => 'ES',
            'espana' => 'ES',
            'greece' => 'GR',
            'netherlands' => 'NL',
            'holland' => 'NL',
            'hungary' => 'HU',
            'bulgaria' => 'BG',
            'romania' => 'RO',
            'malta' => 'MT',
            'lithuania' => 'LT',
            'latvia' => 'LV',
            'albania' => 'AL',
            'turkey' => 'TR',
            'türkiye' => 'TR',
            'belgium' => 'BE',
        ];
        
        if (isset($countryMappings[$lowerName])) {
            $iso = $countryMappings[$lowerName];
            Log::info("Country found (mapping): {$trimmedName} -> {$iso}");
            return $iso;
        }

        Log::warning("Country not found: {$trimmedName}");
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
     * Normalize CSV header keys to a consistent format
     */
    protected function normalizeKey(string $key): string
    {
        $key = str_replace("\xc2\xa0", ' ', $key); // replace non-breaking space
        $key = trim($key);
        $key = preg_replace('/[^\pL\pN]+/u', '_', $key);
        $key = trim($key, '_');
        return mb_strtolower($key);
    }

    /**
     * Normalize row keys and merge with original keys
     */
    protected function normalizeRowKeys(array $row): array
    {
        $normalized = $row;
        foreach ($row as $key => $value) {
            $normalizedKey = $this->normalizeKey((string) $key);
            if (!array_key_exists($normalizedKey, $normalized)) {
                $normalized[$normalizedKey] = $value;
            }
            $compactKey = str_replace('_', '', $normalizedKey);
            if (!array_key_exists($compactKey, $normalized)) {
                $normalized[$compactKey] = $value;
            }
        }
        return $normalized;
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
            $normalizedKey = $this->normalizeKey((string) $key);
            if (isset($row[$normalizedKey]) && !empty($row[$normalizedKey])) {
                return $row[$normalizedKey];
            }
            $compactKey = str_replace('_', '', $normalizedKey);
            if (isset($row[$compactKey]) && !empty($row[$compactKey])) {
                return $row[$compactKey];
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
        $row = $this->normalizeRowKeys($row);

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

        // Name fields (volunteers)
        $fullName = $this->getRowValue($row, [
            'name',
            'Name',
        ]);
        $firstName = $this->getRowValue($row, [
            'first_name',
            'First Name',
        ]);
        $lastName = $this->getRowValue($row, [
            'last_name',
            'Last Name',
        ]);
        $jobTitle = $this->getRowValue($row, [
            'job_title',
            'Job Title',
        ]);
        $mainEmailAddress = $this->getRowValue($row, [
            'main_email_address',
            'Main email address',
        ]);

        // Optional location field (if present)
        $locationValue = $this->getRowValue($row, [
            'location',
            'Location',
        ]);

        // Skip rows without essential data
        if (empty($email) && empty($organisationName)) {
            Log::warning('[MatchmakingProfileImport] Skipping row - missing email and organisation_name', $row);
            return null;
        }

        // Trim values
        $email = $email ? trim($email) : null;
        $organisationName = $organisationName ? trim($organisationName) : null;
        $fullName = $fullName ? trim($fullName) : null;
        $firstName = $firstName ? trim($firstName) : null;
        $lastName = $lastName ? trim($lastName) : null;
        $jobTitle = $jobTitle ? trim($jobTitle) : null;
        $mainEmailAddress = $mainEmailAddress ? trim($mainEmailAddress) : null;
        $locationValue = $locationValue ? trim($locationValue) : null;

        // Determine type - if organisation_name exists, it's an organisation, otherwise volunteer
        $type = !empty($organisationName) 
            ? MatchmakingProfile::TYPE_ORGANISATION 
            : MatchmakingProfile::TYPE_VOLUNTEER;

        // If we only have full name, split into first/last for volunteers
        if ($type === MatchmakingProfile::TYPE_VOLUNTEER && empty($firstName) && empty($lastName) && !empty($fullName)) {
            $parts = preg_split('/\s+/', $fullName);
            $firstName = array_shift($parts);
            $lastName = count($parts) ? implode(' ', $parts) : null;
        }
        
        Log::info('[MatchmakingProfileImport] Processing row', [
            'type' => $type,
            'email' => $email,
            'organisation_name' => $organisationName,
        ]);

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
            // Clean and extract country name from potentially complex values
            // Handle cases like "Fier, Albamia", "Durres/Albania/ Albania", "Belgium/Brussels/..."
            $cleanedCountry = $this->extractCountryName($countryValue);
            $countryIso = $this->findCountryIso($cleanedCountry);
            Log::info('[MatchmakingProfileImport] Country lookup', [
                'original_input' => $countryValue,
                'cleaned' => $cleanedCountry,
                'result' => $countryIso,
            ]);
        } else {
            Log::info('[MatchmakingProfileImport] No country value found in row');
            static $loggedKeys = false;
            if (!$loggedKeys) {
                $loggedKeys = true;
                Log::info('[MatchmakingProfileImport] Row keys sample', [
                    'keys' => array_keys($row),
                ]);
            }
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

        // Check if profile already exists
        // Use case-insensitive matching and trim whitespace
        $existingProfile = null;
        
        if ($type === MatchmakingProfile::TYPE_ORGANISATION && !empty($organisationName)) {
            // For organisations, check by organisation name (case-insensitive, trimmed)
            $trimmedOrgName = trim($organisationName);
            $lowerOrgName = mb_strtolower($trimmedOrgName);
            
            // First try with type constraint
            $existingProfile = MatchmakingProfile::where('type', MatchmakingProfile::TYPE_ORGANISATION)
                ->whereRaw('LOWER(TRIM(COALESCE(organisation_name, \'\'))) = ?', [$lowerOrgName])
                ->first();
            
            // If not found, try without type constraint (in case type was set incorrectly)
            if (!$existingProfile) {
                $existingProfile = MatchmakingProfile::whereRaw('LOWER(TRIM(COALESCE(organisation_name, \'\'))) = ?', [$lowerOrgName])
                    ->whereNotNull('organisation_name')
                    ->first();
            }
            
            // Log for debugging
            if ($existingProfile) {
                Log::info('[MatchmakingProfileImport] Found existing organisation', [
                    'id' => $existingProfile->id,
                    'existing_name' => $existingProfile->organisation_name,
                    'existing_type' => $existingProfile->type,
                    'import_name' => $organisationName,
                    'import_type' => $type,
                ]);
            } else {
                Log::info('[MatchmakingProfileImport] No existing organisation found', [
                    'searched_name' => $organisationName,
                    'trimmed' => $trimmedOrgName,
                    'lower' => $lowerOrgName,
                ]);
            }
        } elseif ($type === MatchmakingProfile::TYPE_VOLUNTEER) {
            if (!empty($email)) {
                // For volunteers, check by email (case-insensitive, trimmed)
                $trimmedEmail = trim($email);
                $lowerEmail = mb_strtolower($trimmedEmail);

                // First try with type constraint
                $existingProfile = MatchmakingProfile::where('type', MatchmakingProfile::TYPE_VOLUNTEER)
                    ->whereRaw('LOWER(TRIM(email)) = ?', [$lowerEmail])
                    ->first();

                // If not found, try without type constraint (in case type was set incorrectly)
                if (!$existingProfile) {
                    $existingProfile = MatchmakingProfile::whereRaw('LOWER(TRIM(email)) = ?', [$lowerEmail])
                        ->whereNotNull('email')
                        ->first();
                }

                // Log for debugging
                if ($existingProfile) {
                    Log::info('[MatchmakingProfileImport] Found existing volunteer by email', [
                        'id' => $existingProfile->id,
                        'existing_email' => $existingProfile->email,
                        'existing_type' => $existingProfile->type,
                        'import_email' => $email,
                        'import_type' => $type,
                    ]);
                } else {
                    Log::info('[MatchmakingProfileImport] No existing volunteer found by email', [
                        'searched_email' => $email,
                        'trimmed' => $trimmedEmail,
                        'lower' => $lowerEmail,
                    ]);
                }
            } else {
                // Fallback: match by first + last name when email is missing
                if (!empty($firstName) && !empty($lastName)) {
                    $first = mb_strtolower(trim($firstName));
                    $last = mb_strtolower(trim($lastName));

                    $existingProfile = MatchmakingProfile::where('type', MatchmakingProfile::TYPE_VOLUNTEER)
                        ->whereRaw('LOWER(TRIM(first_name)) = ?', [$first])
                        ->whereRaw('LOWER(TRIM(last_name)) = ?', [$last])
                        ->first();

                    // If not found, try without type constraint (in case type was set incorrectly)
                    if (!$existingProfile) {
                        $existingProfile = MatchmakingProfile::whereRaw('LOWER(TRIM(first_name)) = ?', [$first])
                            ->whereRaw('LOWER(TRIM(last_name)) = ?', [$last])
                            ->first();
                    }

                    if ($existingProfile) {
                        Log::info('[MatchmakingProfileImport] Found existing volunteer by name', [
                            'id' => $existingProfile->id,
                            'existing_first_name' => $existingProfile->first_name,
                            'existing_last_name' => $existingProfile->last_name,
                            'import_first_name' => $firstName,
                            'import_last_name' => $lastName,
                        ]);
                    } else {
                        Log::info('[MatchmakingProfileImport] No existing volunteer found by name', [
                            'searched_first_name' => $firstName,
                            'searched_last_name' => $lastName,
                        ]);
                    }
                } else {
                    Log::info('[MatchmakingProfileImport] Volunteer missing email and name; cannot match', [
                        'email' => $email,
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                        'full_name' => $fullName,
                    ]);
                }
            }
        }

        // If country is still missing, try to infer from location (CSV or existing profile)
        if (empty($countryIso)) {
            $fallbackLocation = $locationValue;
            if (empty($fallbackLocation) && $existingProfile) {
                $fallbackLocation = $existingProfile->location;
            }

            if (!empty($fallbackLocation)) {
                $fallbackLocation = trim((string) $fallbackLocation);
                if (strlen($fallbackLocation) === 2) {
                    $countryIso = strtoupper($fallbackLocation);
                } else {
                    $cleanedLocation = $this->extractCountryName($fallbackLocation);
                    $countryIso = $this->findCountryIso($cleanedLocation);
                }
                Log::info('[MatchmakingProfileImport] Country fallback from location', [
                    'location' => $fallbackLocation,
                    'country_iso' => $countryIso,
                ]);
            }
        }

        // Build the profile data - include all fields, even if null
        // This ensures we can clear fields that should be empty
        $profileData = [
            'type' => $type,
            'email' => $email,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'job_title' => $jobTitle,
            'get_email_from' => $mainEmailAddress,
            'organisation_name' => $organisationName,
            'organisation_type' => $organisationType,
            'organisation_mission' => $organisationMission,
            'website' => $website,
            'location' => $locationValue,
            'country' => $countryIso, // This can be null to clear the field
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

        // Only set slug if creating new profile
        if (!$existingProfile) {
            $profileData['slug'] = $slug;
        }

        // For updates, we want to include all fields (even null) to properly update
        // For new records, we can filter out nulls to use defaults
        if ($existingProfile) {
            // Keep all fields for updates, but convert empty strings to null for consistency
            // IMPORTANT: Always include country field even if null, so we can update it
            $profileData = array_map(function ($value) {
                return $value === '' ? null : $value;
            }, $profileData);
            
            // Ensure country is always in the array for updates (even if null)
            if (!array_key_exists('country', $profileData)) {
                $profileData['country'] = $countryIso;
            }
            
            Log::info('[MatchmakingProfileImport] Profile data for update', [
                'country_iso' => $countryIso,
                'country_in_array' => array_key_exists('country', $profileData),
                'country_value' => $profileData['country'] ?? 'NOT SET',
                'all_keys' => array_keys($profileData),
            ]);
        } else {
            // For new records, remove null values to use database defaults
            $profileData = array_filter($profileData, function ($value) {
                return $value !== null;
            });
        }

        try {
            if ($existingProfile) {
                // Update existing profile - use fill() and save() to ensure model events fire
                // Log before update to see what we're updating
                Log::info('[MatchmakingProfileImport] Before update', [
                    'id' => $existingProfile->id,
                    'current_country' => $existingProfile->country,
                    'new_country' => $countryIso,
                    'current_email' => $existingProfile->email,
                    'new_email' => $email,
                    'profile_data_keys' => array_keys($profileData),
                    'country_in_data' => isset($profileData['country']),
                    'country_value' => $profileData['country'] ?? 'NOT SET',
                ]);
                
                // Fill the model with all data
                $existingProfile->fill($profileData);
                
                // Explicitly set country to ensure it updates (even if null)
                // This ensures the field is updated even if it was previously null
                $existingProfile->country = $countryIso;
                
                $existingProfile->save();
                
                // Refresh to get updated values
                $existingProfile->refresh();
                
                Log::info('[MatchmakingProfileImport] Updated existing profile', [
                    'id' => $existingProfile->id,
                    'slug' => $existingProfile->slug,
                    'email' => $existingProfile->email,
                    'organisation_name' => $existingProfile->organisation_name,
                    'country_after_update' => $existingProfile->country,
                    'country_was_set_to' => $countryIso,
                    'updated_fields' => array_keys($profileData),
                ]);
                
                return $existingProfile;
            } else {
                // Create new profile
                $profile = new MatchmakingProfile($profileData);
                $profile->save();
                
                Log::info('[MatchmakingProfileImport] Created new profile', [
                    'id' => $profile->id,
                    'slug' => $profile->slug,
                    'email' => $profile->email,
                    'organisation_name' => $profile->organisation_name,
                ]);
                
                return $profile;
            }
        } catch (\Exception $e) {
            Log::error('[MatchmakingProfileImport] Failed to save profile', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'row' => $row,
                'existing' => $existingProfile ? $existingProfile->id : null,
                'profile_data' => $profileData,
            ]);
            return null;
        }
    }
}
