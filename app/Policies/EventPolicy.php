<?php

namespace App\Policies;

use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class EventPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasRole('super admin')) {
            return true;
        }
    }

    public function approve(User $user, Event $event)
    {

        //        Log::info("can approve ?" . $user->hasRole('super admin'));

        if ($user->hasRole('ambassador')) {
            return $event->country_iso === $user->country_iso;
        }

        return false;
    }

    public function report(User $user, Event $event)
    {

        if ($event->status !== 'APPROVED') {
            return false;
        }

        if (! Carbon::parse($event->start_date)->isPast()) {
            return false;
        }

        if ($event->owner && $user->email === $event->owner->email) {
            return true;
        }

        return false;
    }

    public function view(User $user, Event $event): bool
    {

        if (! is_null($event->owner)) {
            Log::info("Trying to view event {$event->id} from {$event->owner->email} as user {$user->id} with email {$user->email}");
        }

        if ($event->status == 'APPROVED') {
            return true;
        }

        if ($event->owner && $user->email === $event->owner->email) {
            return true;
        }

        if ($user->hasRole('ambassador')) {
            return $event->country_iso === $user->country_iso;
        }

        return false;
    }

    public function edit(User $user, Event $event)
    {

        if ($user->hasRole('ambassador')) {
            if ($event->country_iso === $user->country_iso) {
                return true;
            }
        }

        if (! is_null($event->reported_at)) {
            return false;
        }

        if ($event->owner && $user->email === $event->owner->email) {
            return true;
        }

        return false;
    }

    public function update(User $user, Event $event): bool
    {
        return $this->edit($user, $event);
    }

    public function delete(User $user, Event $event): bool
    {

        if ($user->hasRole('ambassador')) {
            if ($event->country_iso === $user->country_iso) {
                return true;
            }
        }

        if ($event->owner && $user->email === $event->owner->email) {
            return true;
        }

        return false;
    }

    public function promote(User $user, Event $event)
    {

        if ($user->hasRole('ambassador')) {
            if ($event->country_iso === $user->country_iso) {
                return true;
            }
        }

        return false;
    }

    public function feature(User $user, Event $event)
    {

        return false;
    }
}
