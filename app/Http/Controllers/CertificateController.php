<?php

namespace App\Http\Controllers;

use App\Queries\ExcellenceQuery;
use App\Queries\ReportableEventsQuery;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function list(){
        $reported_events = ReportableEventsQuery::reported();
        $excellence = ExcellenceQuery::mine()->get();



        return view ('certificates', compact(['reported_events','excellence']));
    }
}
