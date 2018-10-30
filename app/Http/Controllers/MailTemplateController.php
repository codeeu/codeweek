<?php

namespace App\Http\Controllers;

use App\Helpers\ReminderHelper;
use App\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class MailTemplateController extends Controller
{
    public function ambassador()
    {
        $event = \App\Event::first();
        $ambassadors = \App\User::role('ambassador')->where('country_iso', $event->country_iso)->get();
        return new \App\Mail\EventCreated($event, $ambassadors[0]);

    }

    public function remind_ambassador()
    {
        $ambassadors = \App\User::role('ambassador')->where("country_iso", "<>", "")->get();
        return new \App\Mail\RemindAmbassador($ambassadors[0]);

    }

    public function registered()
    {
        $event = \App\Event::first();
        $ambassadors = \App\User::role('ambassador')->where('country_iso', $event->country_iso)->get();
        return new \App\Mail\EventRegistered($event, $ambassadors[0]);

    }

    public function approved()
    {
        $event = \App\Event::where('id', 162733)->first();
        $ambassadors = \App\User::role('ambassador')->where('country_iso', $event->country_iso)->get();
        return new \App\Mail\EventApproved($event, $ambassadors[0]);

    }

    public function rejected()
    {
        $event = \App\Event::first();
        $ambassadors = \App\User::role('ambassador')->where('country_iso', $event->country_iso)->get();
        return new \App\Mail\EventRejected($event, $ambassadors[0]);

    }

    public function remindcreators()
    {

        $creators = ReminderHelper::getCreatorsWithReportableEvents();

        $user = User::find($creators[0]->creator_id);

        return new \App\Mail\RemindCreator($user);

    }
}
