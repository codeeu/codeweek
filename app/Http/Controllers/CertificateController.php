<?php

namespace App\Http\Controllers;

use App\Queries\ReportableEventsQuery;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function list(){
        $reported_events = ReportableEventsQuery::reported();
        return view ('certificates', compact('reported_events'));
    }
}
