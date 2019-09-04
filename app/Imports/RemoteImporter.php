<?php

namespace App\Imports;

use App\Event;
use App\Importer;
use App\Importers\Eeducation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class RemoteImporter
{


    private $website;
    private $events;


    /**
     * RemoteImporter constructor.
     * @param $website
     * @param $events
     */
    public function __construct($website, $events)
    {
        $this->website = $website;
        $this->events = $events;

    }


    public function import()
    {
        if (empty($this->events)) return null;

        $created = 0;
        $updated = 0;


        foreach ($this->events as $event) {

            //Create event
            $className = 'App\\Importers\\' . $this->website;

            $importer = new $className($event);

            //Store the good completion
            $processed = Importer::firstOrNew(
                [
                    'original_id' => $event->id,
                    'website' => $this->website,
                    'status' => 'ADDED'
                ]
            );

            if (!$processed->exists) {
                $created += $importer->parse();
                $processed->save();
            } else {
                $updated += $importer->update();;
            }


        }

        return array(sizeof($this->events), $created, $updated);
    }


}
