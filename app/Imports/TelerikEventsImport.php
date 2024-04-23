<?php

namespace App\Imports;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TelerikEventsImport extends DefaultValueBinder implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    public function parseDate($date)
    {
        return Date::excelToDateTimeObject($date);
    }

    public function model(array $row): ?Model
    {

        Log::info($row);

        $event = new Event([
            'status' => 'APPROVED',
            'title' => $row['activity_title'],
            'slug' => str_slug($row['activity_title']),
            'organizer' => $row['name_of_organisation'],
            'description' => $row['description'],
            'organizer_type' => $row['type_of_organisation'],
            'activity_type' => $row['activity_type'],
            'location' => $row['address'],
            'event_url' => $row['organiser_website'],
            'user_email' => '',
            'creator_id' => $row['creator_id'],
            'contact_person' => $row['contact_email'],
            'country_iso' => 'BG',
            'picture' => $row['image_path'],
            'pub_date' => now(),
            'created' => now(),
            'updated' => now(),
            'codeweek_for_all_participation_code' => 'cw19-telerik',
            'start_date' => $this->parseDate($row['start_date']),
            'end_date' => $this->parseDate($row['end_date']),
            'geoposition' => $row['latitude'].','.$row['longitude'],
            'longitude' => $row['longitude'],
            'latitude' => $row['latitude'],
            'mass_added_for' => 'Excel',
        ]);

        $event->save();

        $event->audiences()->attach(explode(',', $row['audience_comma_separated_ids']));
        $event->themes()->attach(explode(',', $row['theme_comma_separated_ids']));

        return $event;

    }
}
