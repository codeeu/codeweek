<?php

namespace App\Imports;

use App\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EventsImport extends BaseEventsImport implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    public function parseDate($date)
    {
        $arr = explode(',', $date);
        array_shift($arr);

        return implode($arr);
    }

    public function model(array $row): ?Model
    {

        //dd($row);
        //dd(implode(",",$arr));
        //dd(Carbon::parse($this->parseDate($row["start_date"]))->toDateTimeString());
        //dd(Carbon::createFromFormat("d/m/Y",$row["start_date"])->toDateTimeString());

        Log::info($row);

        //Log::info($row["Address"]);
        $event = new Event([
            'status' => 'APPROVED',
            'title' => $row['activity_title'],
            'slug' => str_slug($row['activity_title']),
            'organizer' => $row['name_of_organisation'],
            'description' => $row['description'],
            'organizer_type' => $row['type_of_organisation'],
            'location' => $row['address'],
            'event_url' => $row['organiser_website'],
            'user_email' => '',
            'creator_id' => $row['creator_id'],
            'country_iso' => $row['country'],
            'picture' => $row['image_path'],
            'picture_detail' => $row['image_path_detail'],
            'pub_date' => now(),
            'created' => now(),
            'updated' => now(),
            'codeweek_for_all_participation_code' => 'cw19-apple-eu',
            'start_date' => Carbon::parse($this->parseDate($row['start_date']))->toDateTimeString(),
            'end_date' => Carbon::parse($this->parseDate($row['end_date']))->toDateTimeString(),
            'geoposition' => $row['latitude'].','.$row['longitude'],
            'longitude' => $row['longitude'],
            'latitude' => $row['latitude'],
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

        $event->audiences()->attach(explode(',', $row['audience_comma_separated_ids']));
        $validThemeIds = $this->validateThemes($row['theme_comma_separated_ids'] ?? '');
        if (count($validThemeIds) > 0 ) {
            $event->themes()->attach($validThemeIds);
        }

        return $event;

    }
}
