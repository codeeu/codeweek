<?php

namespace App\Imports;

use App\Event;
use App\Importer;
use Carbon\Carbon;

class RemoteImporter
{
    private $website;

    private $events;

    /**
     * RemoteImporter constructor.
     */
    public function __construct($website, $events)
    {
        $this->website = $website;
        $this->events = $events;

    }

    public function import()
    {
        if (empty($this->events)) {
            return null;
        }

        $created = 0;
        $updated = 0;

        foreach ($this->events as $remote_event) {

            //Create event
            $className = 'App\\Importers\\'.$this->website;

            $remote_site = new $className($remote_event);

            //Store the good completion
            $tracker = Importer::firstOrNew(
                [
                    'original_id' => $remote_event->id,
                    'website' => $this->website,
                    'status' => 'ADDED',
                ]
            );

            if (! $tracker->exists) {
                // Create Event in the Codeweek Database
                $event = $remote_site->parse();

                //Update the importer with the newly created ID
                $tracker->original_updated_at = $remote_site->getUpdatedTimestamp();
                $tracker->event_id = $event->id;
                $tracker->seen_at = Carbon::now();
                $tracker->save();
                $created++;
            } else {
                if ($tracker->original_updated_at != $remote_site->getUpdatedTimestamp()) {
                    $remote_site->update($tracker->event);
                    $tracker->original_updated_at = $remote_site->getUpdatedTimestamp();
                    $tracker->seen_at = Carbon::now();
                    $tracker->save();
                    $updated++;
                } else {
                    $tracker->seen_at = Carbon::now();
                    $tracker->save();
                }

            }

        }

        return [count($this->events), $created, $updated];
    }
}
