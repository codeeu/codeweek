<?php

namespace App\Observers;

use App\Event;
use App\ExperienceType;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     *
     * @param Event $event
     * @return void
     */
    public function created(Event $event)
    {
        //
    }

    /**
     * Handle the Event "updated" event.
     *
     * @param Event $event
     * @return void
     */
    public function updated(Event $event)
    {

        if (!is_null($event->reported_at) && is_null($event->getOriginal('reported_at'))) {
            $event->owner->awardExperience(2);
        }

//        if ($event->status == 'APPROVED' && $event->getOriginal('status') !== 'APPROVED') {
//            $event->owner->awardExperience(100);
//        }

    }

    /**
     * Handle the Event "deleted" event.
     *
     * @param Event $event
     * @return void
     */
    public function deleted(Event $event)
    {
        //
    }

    /**
     * Handle the Event "restored" event.
     *
     * @param Event $event
     * @return void
     */
    public function restored(Event $event)
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     *
     * @param Event $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        //
    }
}
