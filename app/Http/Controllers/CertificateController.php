<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Queries\ExcellenceQuery;
use App\Queries\ReportableEventsQuery;
use App\Queries\SuperOrganiserQuery;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function list(): View
    {
        $reported_events = ReportableEventsQuery::reported();
        $excellence = ExcellenceQuery::mine()->get();
        $superOrganiser = SuperOrganiserQuery::mine()->get();
        $participation = Auth::user()->participations()->whereActive(true)->orderByDesc('created_at')->get();

        return view('certificates', compact(['reported_events', 'excellence', 'participation', 'superOrganiser']));
    }
}
