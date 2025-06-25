<?php

namespace App\Observers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "updated" event.
     */
    public function updated(Event $event): void
    {

        if (! is_null($event->reported_at) && is_null($event->getOriginal('reported_at'))) {
            $date = new Carbon($event->created_at);
            $event->owner->awardExperience(2, $date->year);
        }

        if (($event->status == 'APPROVED') && ($event->getOriginal('status') !== 'APPROVED') && ! is_null($event->leading_teacher_tag)) {

            Log::info('Experience Added for User ID: '.$event->leadingTeacher->id);
            $date = new Carbon($event->created_at);
            $event->leadingTeacher->awardExperience(2, $date->year);

        }

        if (($event->status !== 'APPROVED') && ($event->getOriginal('status') == 'APPROVED') && ! is_null($event->leading_teacher_tag)) {

            Log::info('Experience Removed for User ID: '.$event->leadingTeacher->id);
            $date = new Carbon($event->created_at);
            $event->leadingTeacher->stripExperience(2, $date->year);

        }

    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "restored" event.
     */
    public function restored(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "saving" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function saving(Event $event)
    {
        if (isset($event->language)) {
            if (is_array($event->language)) {
                $event->language = implode(',', array_filter($event->language));
            }
        }
    }
}
