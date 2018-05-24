<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Event $event){
        return view('report', compact('event'));
    }

    public function store(Event $event){
        $event->update([
            'reported_at'=> Carbon::now()
        ]);

        return $event;
    }
}
