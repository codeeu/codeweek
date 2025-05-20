<?php

namespace App\Imports;

use App\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class IrelandDreamSpaceImport extends BaseEventsImport implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    public function parseDate($date)
    {

        if(strpos($date, '.') !== false) {
            return Date::excelToDateTimeObject($date);
        }

        $return = [];

        $arr = explode('/', $date);

        if(!empty($arr)) {
            $return[] = $arr[2].'-'.$arr[1].'-'.$arr[0];   
        }

        return implode(' ', $return);
    }

    public function model(array $row): ?Model
    {
        $event = new Event([
            'status' => 'APPROVED',
            'title' => $row['event_name'],
            'slug' => str_slug($row['event_name']),
            'organizer' => $row['orgnaization'],
            'description' => '',
            'organizer_type' => $row['type_of_organization'],
            'activity_type' => $row['activity_type'],
            'location' => $row['address'],
            'event_url' => '',
            'contact_person' => $row['email'],
            'user_email' => '',
            'creator_id' => 132942,
            'country_iso' => $row['country'],
            'picture' => '',
            'pub_date' => now(),
            'created' => now(),
            'updated' => now(),
            'codeweek_for_all_participation_code' => '',
            'start_date' => $this->parseDate($row['date']),
            'end_date' => $this->parseDate($row['date']),
            'geoposition' => $row['latitude'].','.$row['longitude'],
            'longitude' => $row['latitude'],
            'latitude' => $row['latitude'],
            'language' => '',
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

        return $event;

    }
}