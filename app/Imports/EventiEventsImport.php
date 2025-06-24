<?php

namespace App\Imports;

use App\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EventiEventsImport extends BaseEventsImport implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    public function parseDate($date)
    {
        $arr = explode(',', $date);
        array_shift($arr);
        return implode($arr);
    }

    public function model(array $row): ?Model
    {
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
            Log::error('Missing required fields in row');
            return null;
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
                'user_email' => '',
                'creator_id' => 132942,
                'country_iso' => trim($row['country']),
                'picture' => !empty($row['image_path']) ? trim($row['image_path']) : '',
                'pub_date' => now(),
                'created' => now(),
                'updated' => now(),
                'codeweek_for_all_participation_code' => 'cw20-coderdojo-eu',
                'start_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['start_date']),
                'end_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['end_date']),
                'geoposition' => (!empty($row['latitude']) && !empty($row['longitude'])) ? $row['latitude'] . ',' . $row['longitude'] : '',
                'longitude' => !empty($row['longitude']) ? trim($row['longitude']) : '',
                'latitude' => !empty($row['latitude']) ? trim($row['latitude']) : '',
                'language' => !empty($row['language']) ? trim($row['language']) : 'nl',
                'approved_by' => 19588,
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

            if (!empty($row['audience_comma_separated_ids'])) {
                $audiences = array_unique(array_map('trim', explode(',', $row['audience_comma_separated_ids'])));
                $audiences = array_filter($audiences, function ($id) {
                    return is_numeric($id) && $id > 0 && $id <= 100;
                });
                if (!empty($audiences)) {
                    $event->audiences()->attach($audiences);
                }
            }

            if (!empty($row['theme_comma_separated_ids'])) {
                $validThemeIds = $this->validateThemes($row['theme_comma_separated_ids'] ?? '');
                if (count($validThemeIds) > 0 ) {
                    $event->themes()->attach($validThemeIds);
                }
            }

            return $event;
        } catch (\Exception $e) {
            Log::error('Event import failed: ' . $e->getMessage());
            return null;
        }
    }
}
