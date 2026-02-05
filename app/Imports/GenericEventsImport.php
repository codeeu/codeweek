<?php

namespace App\Imports;

use App\Event;
use App\Helpers\UserHelper;
use App\User;
use App\Services\BulkEventImportResult;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Str;

class GenericEventsImport extends BaseEventsImport implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    protected ?string $defaultCreatorEmail = null;

    protected ?BulkEventImportResult $result = null;

    /** Current Excel row number (2 = first data row after header). */
    protected int $currentRow = 2;

    public function __construct(?string $defaultCreatorEmail = null, ?BulkEventImportResult $result = null)
    {
        $this->defaultCreatorEmail = $defaultCreatorEmail ? trim($defaultCreatorEmail) : null;
        $this->result = $result;
    }

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
        } catch (\Exception) {
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
        return in_array($v, ['1','true','yes','y'], true);
    }

    /**
     * Parse a coordinate value from Excel (may be float, string with dot or comma decimal).
     * Returns float or null if empty/invalid.
     */
    protected function parseCoordinate($value): ?float
    {
        if ($value === null || $value === '') {
            return null;
        }
        $s = trim((string) $value);
        if ($s === '') {
            return null;
        }
        $s = str_replace(',', '.', $s);
        if (! is_numeric($s)) {
            return null;
        }
        return (float) $s;
    }

    /**
     * Validate latitude/longitude. Returns null if valid, or error message if invalid.
     */
    protected function validateCoordinates(array $row): ?string
    {
        $lat = $this->parseCoordinate($row['latitude'] ?? null);
        $lon = $this->parseCoordinate($row['longitude'] ?? null);
        if ($lat === null && $lon === null) {
            return null;
        }
        if ($lat === null || $lon === null) {
            return 'value must be numeric';
        }
        if ($lat < -90 || $lat > 90 || $lon < -180 || $lon > 180) {
            return 'latitude must be -90 to 90, longitude -180 to 180';
        }
        return null;
    }

    /**
     * Resolve creator_id: row creator_id -> default creator email -> contact_email (find or create user).
     */
    protected function resolveCreatorId(array $row): ?int
    {
        if (! empty($row['creator_id']) && is_int($row['creator_id'])) {
            return $row['creator_id'];
        }
        if (! empty($row['creator_id']) && filter_var($row['creator_id'], FILTER_VALIDATE_EMAIL)) {
            $id = User::where('email', trim($row['creator_id']))->value('id');
            if ($id) {
                return $id;
            }
        }
        if ($this->defaultCreatorEmail && filter_var($this->defaultCreatorEmail, FILTER_VALIDATE_EMAIL)) {
            $id = User::where('email', $this->defaultCreatorEmail)->value('id');
            if ($id) {
                return $id;
            }
        }
        $contactEmail = trim($row['contact_email'] ?? '');
        if (! $contactEmail || ! filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
            return null;
        }
        $user = User::where('email', $contactEmail)->first();
        if ($user) {
            return $user->id;
        }
        [$local] = explode('@', $contactEmail, 2);
        $user = User::where('email', 'like', "{$local}@%")->first();
        if ($user) {
            return $user->id;
        }
        try {
            $user = UserHelper::createUser($contactEmail);
            return $user->id;
        } catch (\Exception $e) {
            Log::warning('User creation failed for contact_email: '.$contactEmail, ['exception' => $e->getMessage()]);
            return null;
        }
    }

    private function recordFailure(int $rowIndex, string $reason): void
    {
        if ($this->result) {
            $this->result->addFailure($rowIndex, $reason);
        }
    }

    private function recordCreated(Event $event): void
    {
        if ($this->result) {
            $this->result->addCreated($event);
        }
    }

    /**
     * Map a row to an Event model.
     */
    public function model(array $row): ?Model
    {
        $rowIndex = $this->currentRow++;
        $row = $this->normalizeRow($row);
        Log::info('Importing row:', $row);

        // 1) coordinate validation
        $coordError = $this->validateCoordinates($row);
        if ($coordError !== null) {
            $this->recordFailure($rowIndex, 'Row ' . $rowIndex . ' — columns latitude, longitude: ' . $coordError);
            Log::warning($coordError, $row);
            return null;
        }

        // 2) required fields
        $required = [
            'activity_title' => 'activity_title',
            'name_of_organisation' => 'name_of_organisation',
            'description' => 'description',
            'type_of_organisation' => 'type_of_organisation',
            'activity_type' => 'activity_type',
            'country' => 'country',
            'start_date' => 'start_date',
            'end_date' => 'end_date',
        ];
        $missing = [];
        foreach ($required as $key => $label) {
            if (empty($row[$key])) {
                $missing[] = $label;
            }
        }
        if ($missing !== []) {
            $this->recordFailure($rowIndex, 'Row ' . $rowIndex . ' — missing required columns: ' . implode(', ', $missing));
            Log::error('Missing required fields, skipping row.', $row);
            return null;
        }

        $startDate = $this->parseDate($row['start_date']);
        $endDate = $this->parseDate($row['end_date']);
        if ($startDate === null || $endDate === null) {
            $badDates = [];
            if ($startDate === null && trim((string) ($row['start_date'] ?? '')) !== '') {
                $badDates[] = 'start_date';
            }
            if ($endDate === null && trim((string) ($row['end_date'] ?? '')) !== '') {
                $badDates[] = 'end_date';
            }
            $colList = $badDates !== [] ? implode(', ', $badDates) : 'start_date, end_date';
            $this->recordFailure($rowIndex, 'Row ' . $rowIndex . ' — invalid date format in column(s): ' . $colList);
            return null;
        }

        // 3) resolve creator_id
        $creatorId = $this->resolveCreatorId($row);
        if ($creatorId === null && ! empty(trim($row['contact_email'] ?? ''))) {
            $this->recordFailure($rowIndex, 'Row ' . $rowIndex . ' — could not resolve or create user (column: contact_email)');
            return null;
        }

        // 4) build attribute array
        $picture = trim($row['image_path'] ?? '');
        if ($picture && !Str::startsWith($picture, ['http://','https://'])) {
            $picture = 'https://codeweek-s3.s3.amazonaws.com' . $picture;
        }
        $lat = $this->parseCoordinate($row['latitude'] ?? null);
        $lon = $this->parseCoordinate($row['longitude'] ?? null);
        $attrs = [
            'status'              => 'APPROVED',
            'title'               => trim($row['activity_title']),
            'slug'                => Str::slug(trim($row['activity_title'])),
            'organizer'           => trim($row['name_of_organisation']),
            'description'         => trim($row['description']),
            'organizer_type'      => trim($row['type_of_organisation']),
            'activity_type'       => trim($row['activity_type']),
            'location'            => trim($row['address'] ?? ''),
            'event_url'           => trim($row['organiser_website'] ?? ''),
            'user_email'          => trim($row['contact_email'] ?? ''),
            'creator_id'          => $creatorId,
            'country_iso'         => strtoupper(trim($row['country'])),
            'picture'             => $picture,
            'participants_count'  => isset($row['participants_count'])
                                    ? (int) $row['participants_count']
                                    : null,
            'mass_added_for'      => 'Excel',
            'start_date'          => $startDate,
            'end_date'            => $endDate,
            'geoposition'         => ($lat !== null && $lon !== null) ? "{$lat},{$lon}" : '',
            'latitude'            => $lat ?? 0.0,
            'longitude'           => $lon ?? 0.0,
            'language'            => isset($row['language'])
                                     ? strtolower(explode('_', trim($row['language']))[0])
                                     : 'en',
            'pub_date'            => now(),
            'created'             => now(),
            'updated'             => now(),
            'recurring_event'     => $this->parseBool($row['recurring_event'] ?? ''),
            'leading_teacher_tag' => $row['leading_teacher_tag'] ?? null,
            'codeweek_for_all_participation_code' => $row['codeweek_for_all_participation_code'] ?? '',
        ];

        // 5) optional counts & booleans
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

        // 6) multi-choice fields
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

        // 7) contact_person fallback
        if (Schema::hasColumn('events','contact_person') && !empty($row['contact_email'])) {
            $attrs['contact_person'] = trim($row['contact_email']);
        }

        // 8) duplicate check: find existing by title + start_date + country_iso + organizer; if found, update instead of create
        $existing = Event::where('title', $attrs['title'])
            ->where('start_date', $attrs['start_date'])
            ->where('country_iso', $attrs['country_iso'])
            ->where('organizer', $attrs['organizer'])
            ->first();

        try {
            if ($existing) {
                $event = $existing;
                foreach ($attrs as $k => $v) {
                    $event->$k = $v;
                }
                $event->save();

                $event->audiences()->detach();
                if (!empty($row['audience_comma_separated_ids'])) {
                    $aud = array_filter(
                        explode(',', $row['audience_comma_separated_ids']),
                        fn($i) => is_numeric($i) && $i>0 && $i<=100
                    );
                    $event->audiences()->attach(array_unique($aud));
                }
                $event->themes()->detach();
                if (!empty($row['theme_comma_separated_ids'])) {
                    $themes = $this->validateThemes($row['theme_comma_separated_ids']);
                    $event->themes()->attach($themes);
                }
            } else {
                $event = new Event;
                foreach ($attrs as $k => $v) {
                    $event->$k = $v;
                }
                $event->save();

                if (!empty($row['audience_comma_separated_ids'])) {
                    $aud = array_filter(
                        explode(',', $row['audience_comma_separated_ids']),
                        fn($i) => is_numeric($i) && $i>0 && $i<=100
                    );
                    $event->audiences()->attach(array_unique($aud));
                }
                if (!empty($row['theme_comma_separated_ids'])) {
                    $themes = $this->validateThemes($row['theme_comma_separated_ids']);
                    $event->themes()->attach($themes);
                }
            }

            $this->recordCreated($event);
            return $event;
        } catch (\Exception $e) {
            $this->recordFailure($rowIndex, 'Row ' . $rowIndex . ' — save failed: ' . $e->getMessage());
            Log::error('Event import failed: '.$e->getMessage(), $attrs);
            return null;
        }
    }
}
