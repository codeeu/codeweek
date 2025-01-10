<?php

namespace App\Imports;

use App\Event;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class IrelandDreamSpaceImport extends DefaultValueBinder implements ToModel, WithCustomValueBinder, WithHeadingRow
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
            'location' => '',
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
            'geoposition' => '',
            'longitude' => '',
            'latitude' => '',
            'language' => '',
            'approved_by' => 19588,
            'mass_added_for' => 'Excel',
        ]);

        $event->save();

        return $event;

    }
}