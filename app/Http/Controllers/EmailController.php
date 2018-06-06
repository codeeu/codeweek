<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function create(Event $event)
    {
        $user = auth()->user();
        //Mail::to('alainvd@gmail.com')->send(new \App\Mail\EventCreated($event));
        return (new \App\Mail\EventCreated($event, $user));


    }
}
