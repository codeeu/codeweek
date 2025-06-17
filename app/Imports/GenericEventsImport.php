<?php

namespace App\Imports;

use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class GenericEventsImport extends DefaultValueBinder implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    public function parseDate($value)
    {
        // Handle Excel dates or normal string dates
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)->format('Y-m-d H:i:s');
        }

        try {
            return Carbon::parse($value)->format('Y-m-d H:i:s');
        } catch (\Exception $e) {
            Log::warning("Invalid date: {$value}");
            return null;
        }
    }
    

    public function model(array $row): ?Model
    {
        Log::info('Importing row:', $row);

        // Validate required fields
        if (
            empty($row['activity_title']) ||
            empty($row['name_of_organisation']) ||
            empty($row['description']) ||
            empty($row['type_of_organisation']) ||
            empty($row['activity_type']) ||
            empty($row['country']) ||
            empty($row['start_date']) ||
            empty($row['end_date'])
        ) {
            Log::error('Missing required fields in row, skipping.');
            return null;
        }

        // Resolve creator_id
        $creatorId = null;
        if (!empty($row['creator_id'])) {
            if (is_numeric($row['creator_id'])) {
                $creatorId = (int) $row['creator_id'];
            } else {
                $creatorId = User::where('email', trim($row['creator_id']))->value('id');
            }
        }

        try {
            $event = new Event([
                'status' => 'APPROVED',
                'title' => trim($row['activity_title']),
                'slug' => str_slug(trim($row['activity_title'])),
                'organizer' => trim($row['name_of_organisation']),
                'description' => trim($row['description']),
                'organizer_type' => trim($row['type_of_organisation']),
                'activity_type' => trim($row['activity_type']),
                'location' => !empty($row['address']) ? trim($row['address']) : 'online',
                'event_url' => !empty($row['organiser_website']) ? trim($row['organiser_website']) : '',
                'contact_person' => !empty($row['contact_email']) ? trim($row['contact_email']) : '',
                'user_email' => !empty($row['contact_email']) ? trim($row['contact_email']) : '',
                'creator_id' => $creatorId,
                'country_iso' => strtoupper(trim($row['country'])),
                'picture' => !empty($row['image_path']) ? trim($row['image_path']) : '',
                'pub_date' => now(),
                'created' => now(),
                'updated' => now(),
                'codeweek_for_all_participation_code' => '', // You can make this configurable
                'start_date' => $this->parseDate($row['start_date']),
                'end_date' => $this->parseDate($row['end_date']),
                'geoposition' => (!empty($row['latitude']) && !empty($row['longitude'])) ? $row['latitude'] . ',' . $row['longitude'] : '',
                'longitude' => !empty($row['longitude']) ? trim($row['longitude']) : '',
                'latitude' => !empty($row['latitude']) ? trim($row['latitude']) : '',
                'language' => !empty($row['language']) ? strtolower(explode('_', trim($row['language']))[0]) : 'en',
                'mass_added_for' => 'Excel',
                 'recurring_event' => isset($row['recurring_event'])
                    ? $this->validateSingleChoice($row['recurring_event'], Event::RECURRING_EVENTS)
                    : null,

                'males_count' => isset($row['males_count']) ? (int) $row['males_count'] : null,
                'females_count' => isset($row['females_count']) ? (int) $row['females_count'] : null,
                'other_count' => isset($row['other_count']) ? (int) $row['other_count'] : null,

                'is_extracurricular_event' => isset($row['is_extracurricular_event'])
                    ? $this->parseBool($row['is_extracurricular_event'])
                    : false,

                'is_standard_school_curriculum' => isset($row['is_standard_school_curriculum'])
                    ? $this->parseBool($row['is_standard_school_curriculum'])
                    : false,

                'is_use_resource' => isset($row['is_use_resource'])
                    ? $this->parseBool($row['is_use_resource'])
                    : false,

                'activity_format' => isset($row['activity_format'])
                    ? $this->validateMultiChoice($row['activity_format'], Event::ACTIVITY_FORMATS)
                    : [],

                'ages' => isset($row['ages'])
                    ? $this->validateMultiChoice($row['ages'], Event::AGES)
                    : [],

                'duration' => isset($row['duration'])
                    ? $this->validateSingleChoice($row['duration'], Event::DURATIONS)
                    : null,

                'recurring_type' => isset($row['recurring_type'])
                    ? $this->validateSingleChoice($row['recurring_type'], Event::RECURRING_TYPES)
                    : null,
            ]);

            $event->save();

            // Audiences
            if (!empty($row['audience_comma_separated_ids'])) {
                $audiences = array_unique(array_map('trim', explode(',', $row['audience_comma_separated_ids'])));
                $audiences = array_filter($audiences, fn ($id) => is_numeric($id) && $id > 0 && $id <= 100);
                if (!empty($audiences)) {
                    $event->audiences()->attach($audiences);
                }
            }

            // Themes
            if (!empty($row['theme_comma_separated_ids'])) {
                $themes = array_unique(array_map('trim', explode(',', $row['theme_comma_separated_ids'])));
                $themes = array_filter($themes, fn ($id) => is_numeric($id) && $id > 0 && $id <= 100);
                if (!empty($themes)) {
                    $event->themes()->attach($themes);
                }
            }

            return $event;
        } catch (\Exception $e) {
            Log::error('Event import failed: ' . $e->getMessage());
            return null;
        }
    }
}