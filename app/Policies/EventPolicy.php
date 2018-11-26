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

        if (!Carbon::parse($event->start_date)->isPast()) {
            return false;
        };

        if ($user->hasRole('super admin')) {
            return true;
        }

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
        Log::info("Is super admin? {$user->hasRole('super admin')}");
        Log::info("Is ambassador ? {$user->hasRole('ambassador')}");


        if ($user->email === $event->owner->email) {
            Log::info("Email is matching");
            return true;
        }

        if ($user->hasRole('super admin')) {
            return true;
        }

        if ($user->hasRole('ambassador')) {
            if ($event->country_iso === $user->country_iso) return true;
            Log::info("Country is not matching");
        }


        Log::info("Email is not matching -> EDITION REFUSED");

        return false;
    }

    public function update(User $user, Event $event)
    {
        return $this->edit($user,$event);
    }

    public function delete(User $user, Event $event)
    {
        return $this->edit($user,$event);
    }


}
