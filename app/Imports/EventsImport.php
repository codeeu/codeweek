<?php

namespace App\Imports;

use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class EventsImport extends DefaultValueBinder implements WithCustomValueBinder, ToModel, WithHeadingRow
{



    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//dd(Carbon::createFromFormat("d/m/Y",$row["start_date"])->toDateTimeString());
        //Log::info($row["Address"]);
        $event = new Event([
            'status' => "APPROVED",
            'title'  => $row["activity_title"],
            'slug'  => str_slug($row["activity_title"]),
            'organizer'  => $row["name_of_organisation"],
            'description'  => $row["description"],
            'organizer_type'  => $row["type_of_organisation"],
            'location'  => $row["address"],
            'event_url'  => $row["organiser_website"],
            'user_email'  => $row["contact_email"],
            'creator_id'  => 19588,
            'country_iso' => "NL",
            'picture' => $row["image_path"],
            "pub_date" => now(),
            "created" => now(),
            "updated" => now(),
            "start_date" => Carbon::createFromFormat("!d/m/Y",$row["start_date"])->toDateTimeString(),
            "end_date" => Carbon::createFromFormat("!d/m/Y",$row["end_date"])->toDateTimeString(),
            "geoposition" => $row["latitude"] . "," . $row["longitude"],
            "longitude" => $row["longitude"],
            "latitude" => $row["latitude"]
        ]);

        $event->save();

        $event->audiences()->attach(explode(",",$row["audience_comma_separated_ids"]));
        $event->themes()->attach(explode(",",$row["theme_comma_separated_ids"]));

        return $event;
    }




}
