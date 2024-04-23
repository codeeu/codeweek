<?php

namespace App\Imports;

use App\Event;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DutchDanceEventsImport extends DefaultValueBinder implements ToModel, WithCustomValueBinder, WithHeadingRow
{
    public function parseDate($date)
    {
        return Date::excelToDateTimeObject($date);
    }

    public function loadUser($email)
    {
        return User::firstOrCreate(
            [
                'email' => $email,
            ],
            [
                'firstname' => '',
                'lastname' => '',
                'username' => '',
                'password' => bcrypt(Str::random()),
            ]
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //dd($row);
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
            'creator_id' => $this->loadUser($row['contact_email'])->id,
            'contact_person' => $row['contact_email'],
            'country_iso' => $row['country'],
            'picture' => $row['image_path'],
            'pub_date' => now(),
            'created' => now(),
            'updated' => now(),
            'codeweek_for_all_participation_code' => 'cw21-CodeWeekNL',
            'start_date' => $this->parseDate($row['start_date']),
            'end_date' => $this->parseDate($row['end_date']),
            'geoposition' => $row['longitude'].','.$row['latitude'],
            'longitude' => $row['latitude'],
            'latitude' => $row['longitude'],
            'language' => strtolower($row['language']),
            'mass_added_for' => 'Excel',
        ]);

        $event->save();

        if ($row['audience_comma_separated_ids']) {
            $event
                ->audiences()
                ->attach(explode(',', $row['audience_comma_separated_ids']));
        }
        if ($row['theme_comma_separated_ids']) {
            $event
                ->themes()
                ->attach(explode(',', $row['theme_comma_separated_ids']));
        }

        Log::info($event->slug);

        return $event;
    }
}
