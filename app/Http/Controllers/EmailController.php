<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create(Event $event)
    {
        //Get the ambassador list based on the event country

        $ambassadors = User::role('ambassador')->where('country_iso', $event->country->iso)->paginate(10);


//send emails
        foreach ($ambassadors as $ambassador) {
            Mail::to($ambassador->email)->queue(new \App\Mail\EventCreated($event, $ambassador));
        }

        //return (new \App\Mail\EventCreated($event, $user));


    }
}
