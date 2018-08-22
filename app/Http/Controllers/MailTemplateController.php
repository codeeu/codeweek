<?php

namespace App\Http\Controllers;

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

    public function registered()
    {
        $event = \App\Event::first();
        $ambassadors = \App\User::role('ambassador')->where('country_iso', $event->country_iso)->get();
        return new \App\Mail\EventRegistered($event, $ambassadors[0]);

    }

    public function approved()
    {
        $event = \App\Event::first();
        $ambassadors = \App\User::role('ambassador')->where('country_iso', $event->country_iso)->get();
        return new \App\Mail\EventApproved($event, $ambassadors[0]);

    }

    public function rejected()
    {
        $event = \App\Event::first();
        $ambassadors = \App\User::role('ambassador')->where('country_iso', $event->country_iso)->get();
        return new \App\Mail\EventRejected($event, $ambassadors[0]);

    }
}
