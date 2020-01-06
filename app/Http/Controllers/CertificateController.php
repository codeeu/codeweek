<?php

namespace App\Http\Controllers;

use App\Queries\ExcellenceQuery;
use App\Queries\ParticipationQuery;
use App\Queries\ReportableEventsQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function list(){
        $reported_events = ReportableEventsQuery::reported();
        $excellence = ExcellenceQuery::mine()->get();
        $participation = Auth::user()->participations()->whereActive(true)->get();


        return view ('certificates', compact(['reported_events','excellence','participation']));
    }

}
