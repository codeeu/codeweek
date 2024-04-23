<?php

namespace App\Imports;

use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class CoderDojoEventsImport extends DefaultValueBinder implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    public function parseDate($date)
    {
        $arr = explode(',', $date);
        array_shift($arr);

        return implode($arr);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        //        dd($row["start_date"]);
        //dd(implode(",",$arr));
        (\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['start_date']));
        //        dd(Carbon::parse($this->parseDate($row["start_date"]))->toDateTimeString());
        //dd(Carbon::createFromFormat("d/m/Y",$row["start_date"])->toDateTimeString());
        Log::info($row);

        $event = new Event([
            'status' => 'APPROVED',
            'title' => $row['activity_title'],
            'slug' => str_slug($row['activity_title']),
            'organizer' => $row['name_of_organisation'],
            'description' => $row['description'],
            'organizer_type' => $row['type_of_organisation'],
            'activity_type' => $row['activity_type'],
            'location' => isset($row['address']) ? $row['address'] : 'online',
            'event_url' => $row['organiser_website'],
            'user_email' => '',
            'creator_id' => $row['creator_id'],
            'country_iso' => $row['country'],
            'picture' => $row['image_path'],
            'pub_date' => now(),
            'created' => now(),
            'updated' => now(),
            'codeweek_for_all_participation_code' => 'cw20-coderdojo-eu',
            'start_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['start_date']),
            'end_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['end_date']),
            'geoposition' => $row['latitude'].','.$row['longitude'],
            'longitude' => $row['longitude'],
            'latitude' => $row['latitude'],
            'language' => 'nl',
            'approved_by' => 19588,
            'mass_added_for' => 'Excel',
        ]);

        $event->save();

        $event->audiences()->attach(explode(',', $row['audience_comma_separated_ids']));
        $event->themes()->attach(explode(',', $row['theme_comma_separated_ids']));

        return $event;

    }
}
