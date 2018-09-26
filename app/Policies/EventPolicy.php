<?php

namespace App\Policies;

use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;
use Log;

class EventPolicy
{
    use HandlesAuthorization;

    public function approve(User $user, Event $event)
    {

        Log::info("can approve ?" . $user->hasRole('super admin'));

        if ($user->hasRole('super admin')) {
            return true;
        }
        if ($user->hasRole('ambassador')) {
            return $event->country_iso === $user->country_iso;
        }

        return false;
    }


    public function report(User $user, Event $event)
    {


        if ($event->status != "APPROVED") {
            return false;
        }

        if (!Carbon::parse($event->end_date)->isPast()) {

            return false;
        };

        if ($user->email === $event->owner->email) {
            return true;
        }

        return false;
    }

    public function view(User $user, Event $event)
    {


        Log::info("Trying to view event {$event->id} from {$event->owner->email} as user {$user->id} with email {$user->email}");


        if ($event->status == "APPROVED") {
            return true;
        }

        if ($user->email === $event->owner->email) {
            return true;
        }

        if ($user->hasRole('super admin')) {

            return true;
        }
        if ($user->hasRole('ambassador')) {
            return $event->country_iso === $user->country_iso;
        }


        return false;
    }

    public function edit(User $user, Event $event)
    {

        Log::info("Trying to edit event {$event->id} from {$event->owner->email} as user {$user->id} with email {$user->email}");


        if ($user->hasRole('super admin')) {
            return true;
        }
        if ($user->hasRole('ambassador')) {
            return $event->country_iso === $user->country_iso;
        }

        if ($user->email === $event->owner->email) {
            return true;
        }

        return false;
    }
}
