<?php

namespace App\Imports;

use Illuminate\Database\Eloquent\Model;
use App\ResourceItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithLimit;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class ResourcesTeachImport extends DefaultValueBinder implements ToModel, WithCustomValueBinder, WithHeadingRow, WithLimit
{
    public function parseDate($date)
    {
        $arr = explode(',', $date);
        array_shift($arr);

        return implode($arr);
    }

    public function model(array $row): ?Model
    {

        if (! isset($row['name'])) {
            return null;
        }

        //if (is_null($row) || is_null($row["name"])) return null;

        //Log::info($row);
        //dd($row);
        //dd(implode(",",$arr));
        //dd(Carbon::parse($this->parseDate($row["start_date"]))->toDateTimeString());
        //dd(Carbon::createFromFormat("d/m/Y",$row["start_date"])->toDateTimeString());

        $item = new ResourceItem(
            [
                'name' => $row['name'],
                'description' => $row['description_in_progress'],
                'source' => $row['url'],
                'thumbnail' => $row['thumbnail'],
                'learn' => false,
                'teach' => true,
            ]
        );

        $item->save();

        $item->attachCategories($row['category']);
        $item->attachLanguages($row['languages']);
        $item->attachLevels($row['level']);
        $item->attachProgrammingLanguages($row['programming_language']);
        $item->attachTypes($row['type_of_resource']);
        if (! is_null($row['subject'])) {
            $item->attachSubjects($row['subject']);
        }

        return $item;
    }

    public function limit(): int
    {
        return 40;
    }
}
