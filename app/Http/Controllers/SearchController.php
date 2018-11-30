<?php

namespace App\Http\Controllers;

use App\Country;
use App\Event;
use App\Filters\EventFilters;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(EventFilters $filters, Request $request)
    {
        $events = $this->getEvents($filters);
        $selected_themes = $request->input('theme') ?: [];
        $selected_audiences = $request->input('audience') ?: [];
        $years = [2018, 2017, 2016, 2015, 2014];
        $selected_year = $request->input('year') ?: 2018;

        $country = Country::where('iso','=',session('country_iso'))->first();



        return view('event.search', compact(['events','selected_themes','selected_audiences','years','selected_year','country']));
    }

    protected function getEvents(EventFilters $filters)
    {

        $events = Event::where('status','like','APPROVED')
            ->filter($filters)
            ->orderBy('start_date','desc');

        return $events->paginate(20);
    }
}
