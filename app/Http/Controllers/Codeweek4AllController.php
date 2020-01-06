<?php

namespace App\Http\Controllers;

use App\Event;
use App\Helpers\Codeweek4AllHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Codeweek4AllController extends Controller
{
    public function detail($code, $edition= 2019)
    {
        $edition = 2019;
        $result = Codeweek4AllHelper::getDetailsByCodeweek4All([$code],$edition)->first();
        $countries = Codeweek4AllHelper::getCountriesByCodeweek4All($code, $edition);
        $initiator = Codeweek4AllHelper::getInitiatorByCodeweek4All([$code]);




      /*  $events = Event::where([
            ['codeweek_for_all_participation_code', '=', $code],
            ['status', 'like', 'APPROVED'],
        ]);

        $event_count = $events->count();

        $participants_count = 0;
        $countries = [];
        foreach ($events->get() as $event){
            $participants_count+=$event->participants_count;
            array_push($countries, $event->country->name);
        }

        $countries = array_sort(array_unique($countries));*/


        //dd($event_count);



        return view('codeweek4all.detail', compact(['result','countries','initiator']));
    }
}
