<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create(Event $event)
    {
        //Get the ambassador list based on the event country
        $ambassadors = User::role('ambassador')->where('country_iso', $event->country_iso)->get();

        //send emails
        foreach ($ambassadors as $ambassador) {
            Mail::to($ambassador->email)->queue(new \App\Mail\EventCreated($event, $ambassador));
        }

    }
}
