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
    /**
     * Cast floats with no fractional part back to int.
     */
    protected function normalizeRow(array $row): array
    {
        foreach ($row as $key => $value) {
            if (is_float($value) && floor($value) === $value) {
                $row[$key] = (int) $value;
            }
        }
        return $row;
    }

    /**
     * Parse Excel or string dates into proper format.
     */
    protected function parseDate($value): ?string
    {
        if (is_numeric($value)) {
            return Date::excelToDateTimeObject($value)
                       ->format('Y-m-d H:i:s');
        }
        try {
            return Carbon::parse($value)->format('Y-m-d H:i:s');
        } catch (\Exception $e) {
            Log::warning("Invalid date: {$value}");
            return null;
        }
    }

    /**
     * Normalize boolean-like values.
     */
    protected function parseBool($value): bool
    {
        $v = strtolower(trim((string) $value));
        return in_array($v, ['1', 'true', 'yes', 'y'], true);
    }

    /**
     * Map a row to an Event model.
     */
    public function model(array $row): ?Model
    {
        // 1) normalize numeric floats
        $row = $this->normalizeRow($row);

        Log::info('Importing row:', $row);

        // 2) required fields
        if (empty($row['activity_title'])
            || empty($row['name_of_organisation'])
            || empty($row['description'])
            || empty($row['type_of_organisation'])
            || empty($row['activity_type'])
            || empty($row['country'])
            || empty($row['start_date'])
            || empty($row['end_date'])
        ) {
            Log::error('Missing required fields, skipping row.', $row);
            return null;
        }

        // 3) resolve creator_id
        $creatorId = null;
        if (!empty($row['creator_id']) && is_int($row['creator_id'])) {
            $creatorId = $row['creator_id'];
        } elseif (!empty($row['creator_id']) && filter_var($row['creator_id'], FILTER_VALIDATE_EMAIL)) {
            $creatorId = User::where('email', trim($row['creator_id']))->value('id');
        } elseif (!empty($row['contact_email']) && filter_var($row['contact_email'], FILTER_VALIDATE_EMAIL)) {
            [$local] = explode('@', trim($row['contact_email']), 2);
            $creatorId = User::where('email', 'like', $local.'@%')->value('id');
        }
        // leave null if not resolvable

        // 4) base attributes
        $attrs = [
            'status'              => 'APPROVED',
            'title'               => trim($row['activity_title']),
            'slug'                => str_slug(trim($row['activity_title'])),
            'organizer'           => trim($row['name_of_organisation']),
            'description'         => trim($row['description']),
            'organizer_type'      => trim($row['type_of_organisation']),
            'activity_type'       => trim($row['activity_type']),
            'location'            => trim($row['address'] ?? ''),
            'event_url'           => trim($row['organiser_website'] ?? ''),
            'user_email'          => trim($row['contact_email'] ?? ''),
            'creator_id'          => $creatorId,
            'country_iso'         => strtoupper(trim($row['country'])),
            'picture'             => trim($row['image_path'] ?? ''),
            'participants_count'  => isset($row['participants_count']) ? (int) $row['participants_count'] : null,
            'mass_added_for'      => 'Excel',
            'start_date'          => $this->parseDate($row['start_date']),
            'end_date'            => $this->parseDate($row['end_date']),
            'geoposition'         => (!empty($row['latitude']) && !empty($row['longitude']))
                                     ? "{$row['latitude']},{$row['longitude']}"
                                     : '',
            'longitude'           => trim((string) ($row['longitude'] ?? '')),
            'latitude'            => trim((string) ($row['latitude'] ?? '')),
            'language'            => isset($row['language'])
                                     ? strtolower(explode('_', trim($row['language']))[0])
                                     : 'en',
            'pub_date'            => now(),
            'created'             => now(),
            'updated'             => now(),
            // ensure boolean default for non-nullable
            'recurring_event'     => $this->parseBool($row['recurring_event'] ?? ''),
        ];

        // 5) optional counts
        foreach (['males_count','females_count','other_count'] as $c) {
            if (isset($row[$c])) {
                $attrs[$c] = (int) $row[$c];
            }
        }

        // 6) optional booleans
        foreach (['is_extracurricular_event','is_standard_school_curriculum','is_use_resource'] as $b) {
            if (isset($row[$b])) {
                $attrs[$b] = $this->parseBool($row[$b]);
            }
        }

        // 7) multi‑choice arrays
        if (!empty($row['activity_format'])) {
            $attrs['activity_format'] = $this->validateMultiChoice(
                $row['activity_format'],
                Event::ACTIVITY_FORMATS
            );
        }
        if (!empty($row['ages'])) {
            $attrs['ages'] = $this->validateMultiChoice(
                $row['ages'],
                Event::AGES
            );
        }
        if (!empty($row['duration'])) {
            $attrs['duration'] = $this->validateSingleChoice(
                $row['duration'],
                Event::DURATIONS
            );
        }
        if (!empty($row['recurring_type'])) {
            $attrs['recurring_type'] = $this->validateSingleChoice(
                $row['recurring_type'],
                Event::RECURRING_TYPES
            );
        }

        // 8) contact_person fallback
        if (Schema::hasColumn('events', 'contact_person')
            && !empty($row['contact_email'])
        ) {
            $attrs['contact_person'] = trim($row['contact_email']);
        }

        // 9) persist & pivot attaches
        try {
            $event = new Event;
            foreach ($attrs as $key => $value) {
                $event->$key = $value;
            }
            $event->save();

            if (!empty($row['audience_comma_separated_ids'])) {
                $aud = array_filter(
                    explode(',', $row['audience_comma_separated_ids']),
                    fn($i) => is_numeric($i) && $i > 0 && $i <= 100
                );
                $event->audiences()->attach(array_unique($aud));
            }

            if (!empty($row['theme_comma_separated_ids'])) {
                $themes = $this->validateThemes($row['theme_comma_separated_ids']);
                $event->themes()->attach($themes);
            }

            return $event;
        } catch (\Exception $e) {
            Log::error('Event import failed: '.$e->getMessage(), $attrs);
            return null;
        }
    }
}
