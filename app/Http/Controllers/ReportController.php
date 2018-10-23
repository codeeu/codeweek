<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Event;
use App\Queries\PendingEventsQuery;
use App\Queries\ReportableEventsQuery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function list()
    {
        $reportable_events = ReportableEventsQuery::reportable();

        return view('report.list', ['events' => $reportable_events]);
    }

    public function index(Event $event)
    {
        $this->authorize('report', $event);
        return view('report.index', compact('event'));
    }

    public function store(Event $event, Request $request)
    {


        $this->authorize('report', $event);

        $this->validate($request, [
            'participants_count' => 'required|numeric|min:1',
            'average_participant_age' => 'required|numeric|min:1',
            'percentage_of_females' => 'required|numeric|between:0,100',
            'name_for_certificate' => 'required'
        ]);

        $event->update([
            'reported_at' => Carbon::now()
        ]);

        $input = $request->all();

        $event->update($input);


        $event->update(['certificate_url' => (new Certificate($event))->generate()]);


        return view('report.thankyou', compact('event'));
    }
}
