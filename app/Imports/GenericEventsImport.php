<?php

namespace App\Imports;

use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class GenericEventsImport extends BaseEventsImport implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    public function parseDate($value)
    {
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

        // required fields
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

        // resolve creator_id (if that column exists)
        $creatorId = null;
        if (isset($row['creator_id']) && $row['creator_id'] !== '') {
            $creatorId = is_numeric($row['creator_id'])
                ? (int) $row['creator_id']
                : User::where('email', trim($row['creator_id']))->value('id');
        }

        $attrs = [
            'status'      => 'APPROVED',
            'title'       => trim($row['activity_title']),
            'slug'        => str_slug(trim($row['activity_title'])),
            'organizer'   => trim($row['name_of_organisation']),
            'description' => trim($row['description']),
            'organizer_type' => trim($row['type_of_organisation']),
            'activity_type'  => trim($row['activity_type']),
            'location'    => isset($row['address']) ? trim($row['address']) : 'online',
            'event_url'   => isset($row['organiser_website']) ? trim($row['organiser_website']) : '',
            'user_email'  => isset($row['contact_email'])      ? trim($row['contact_email'])      : '',
            'creator_id'  => $creatorId,
            'country_iso' => strtoupper(trim($row['country'])),
            'picture'     => isset($row['image_path'])         ? trim($row['image_path'])         : '',
            'pub_date'    => now(),
            'created'     => now(),
            'updated'     => now(),
            'participants_count' => isset($row['participants_count'])
                                   ? (int) $row['participants_count']
                                   : null,
            'mass_added_for' => 'Excel',
            'start_date'     => $this->parseDate($row['start_date']),
            'end_date'       => $this->parseDate($row['end_date']),
            'geoposition'    => (isset($row['latitude'], $row['longitude']) && $row['latitude'] !== '' && $row['longitude'] !== '')
                                ? $row['latitude'] . ',' . $row['longitude']
                                : '',
            'longitude'      => isset($row['longitude'])  ? trim($row['longitude'])  : '',
            'latitude'       => isset($row['latitude'])   ? trim($row['latitude'])   : '',
            'language'       => isset($row['language'])
                                ? strtolower(explode('_', trim($row['language']))[0])
                                : 'en',
        ];

        // optional single‐choice / boolean / counts
        if (isset($row['recurring_event'])) {
            $attrs['recurring_event'] = $this->validateSingleChoice($row['recurring_event'], Event::RECURRING_EVENTS);
        }
        foreach (['males_count','females_count','other_count'] as $c) {
            if (isset($row[$c])) {
                $attrs[$c] = (int) $row[$c];
            }
        }
        foreach (['is_extracurricular_event','is_standard_school_curriculum','is_use_resource'] as $b) {
            if (isset($row[$b])) {
                $attrs[$b] = $this->parseBool($row[$b]);
            }
        }

        // multi‐choice arrays
        if (isset($row['activity_format'])) {
            $attrs['activity_format'] = $this->validateMultiChoice($row['activity_format'], Event::ACTIVITY_FORMATS);
        }
        if (isset($row['ages'])) {
            $attrs['ages'] = $this->validateMultiChoice($row['ages'], Event::AGES);
        }
        if (isset($row['duration'])) {
            $attrs['duration'] = $this->validateSingleChoice($row['duration'], Event::DURATIONS);
        }
        if (isset($row['recurring_type'])) {
            $attrs['recurring_type'] = $this->validateSingleChoice($row['recurring_type'], Event::RECURRING_TYPES);
        }

        // contact_person only if the *DB* has that column and we have a contact_email
        if (Schema::hasColumn('events','contact_person') && isset($row['contact_email']) && $row['contact_email'] !== '') {
            $attrs['contact_person'] = trim($row['contact_email']);
        }

        try {
            $event = new Event($attrs);
            $event->save();

            // pivot attaches
            if (isset($row['audience_comma_separated_ids'])) {
                $aud = array_filter(
                    array_unique(
                        array_map('trim', explode(',', $row['audience_comma_separated_ids']))
                    ),
                    fn($id) => is_numeric($id) && $id > 0 && $id <= 100
                );
                if ($aud) {
                    $event->audiences()->attach($aud);
                }
            }
            if (isset($row['theme_comma_separated_ids'])) {
                $themes = $this->validateThemes($row['theme_comma_separated_ids']);
                if (count($themes)) {
                    $event->themes()->attach($themes);
                }
            }

            return $event;
        } catch (\Exception $e) {
            Log::error('Event import failed: '.$e->getMessage());
            return null;
        }
    }
}
