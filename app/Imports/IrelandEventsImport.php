<?php

namespace App\Imports;

use App\Event;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class IrelandEventsImport extends DefaultValueBinder implements
    WithCustomValueBinder,
    ToModel,
    WithHeadingRow {
    public function parseDate($date, $time) {
        $time = Date::excelToDateTimeObject($time);
        $date = Carbon::instance(Date::excelToDateTimeObject($date));

        $date->setTimeFrom($time);
        return $date->toDateTime();
    }

    public function loadUser($email) {
        return User::firstOrCreate(
            [
                'email' => $email
            ],
            [
                'firstname' => '',
                'lastname' => '',
                'username' => '',
                'password' => bcrypt(Str::random())
            ]
        );
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row) {
        $event = new Event([
            'creator_id' => $this->loadUser($row['organizer_email'])->id,
            'status' => 'APPROVED',
            'title' => $row['activity_title'],
            'slug' => str_slug($row['activity_title']),
            'organizer' => $row['name_of_organisation'],
            'description' => $row['description'],
            'organizer_type' => $row['type_of_organisation'],
            'activity_type' => $row['activity_type'],
            'location' => $row['address'],
            'event_url' => '',
            'user_email' => '',
            'contact_person' => $row['organizer_email'],
            'country_iso' => 'IE',
            'picture' => $row['image_path'],
            'pub_date' => now(),
            'created' => now(),
            'updated' => now(),
            'codeweek_for_all_participation_code' => 'cw21-PamsIE',
            'start_date' => $this->parseDate(
                $row['start_date'],
                $row['start_time']
            ),
            'end_date' => $this->parseDate($row['end_date'], $row['end_time']),
            'geoposition' => $row['longitude'] . ',' . $row['latitude'],
            'longitude' => $row['latitude'],
            'latitude' => $row['longitude'],
            'language' => 'en'
        ]);

        $event->save();

        if ($row['audience']) {
            $event
                ->audiences()
                ->attach(array_map('trim', explode(',', $row['audience'])));
        }
        if ($row['theme']) {
            $event
                ->themes()
                ->attach(array_map('trim', explode(',', $row['theme'])));
        }

        Log::info($event->slug);
        return $event;
    }
}
