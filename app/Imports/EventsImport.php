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

        Log::info($row); // Keep this for debugging

        // Resolve creator_id
        $creatorId = null;
        if (!empty($row['creator_id'])) {
            if (is_numeric($row['creator_id'])) {
                $creatorId = (int) $row['creator_id'];
            } else {
                $creatorId = \App\User::where('email', trim($row['creator_id']))->value('id');
            }
        }

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
            'user_email' => $row['contact_email'],
            'creator_id' => $creatorId, // 👈 Now safe!
            'country_iso' => strtoupper($row['country']),
            'picture' => $row['image_path'],
            'picture_detail' => $row['image_path_detail'],
            'pub_date' => now(),
            'created' => now(),
            'updated' => now(),
            'codeweek_for_all_participation_code' => '',
            'start_date' => Carbon::parse($this->parseDate($row['start_date']))->toDateTimeString(),
            'end_date' => Carbon::parse($this->parseDate($row['end_date']))->toDateTimeString(),
            'geoposition' => $row['latitude'] . ',' . $row['longitude'],
            'longitude' => $row['longitude'],
            'latitude' => $row['latitude'],
            'mass_added_for' => 'Excel',
        ]);

        $event->save();

        $event->audiences()->attach(explode(',', $row['audience_comma_separated_ids']));
        $validThemeIds = $this->validateThemes($row['theme_comma_separated_ids'] ?? '');
        if (count($validThemeIds) > 0) {
            $event->themes()->attach($validThemeIds);
        }

        return $event;
    }
}
