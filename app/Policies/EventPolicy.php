<?php

namespace App\Policies;

use App\Event;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function approve(User $user, Event $event)
    {


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

        if ($user->email === $event->owner->email) {
            return true;
        }

        return false;
    }

    public function edit(User $user, Event $event)
    {


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
