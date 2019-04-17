<?php

namespace App\Http\Controllers;

use App\Country;
use App\Event;
use App\Filters\EventFilters;
use Illuminate\Http\Request;
use App\Http\Transformers\EventTransformer;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{

    protected $eventTransformer;

    /**
     * EventController constructor.
     * @param $eventTransformer
     */
    public function __construct(EventTransformer $eventTransformer)
    {
        $this->eventTransformer = $eventTransformer;
    }

    public function search(EventFilters $filters, Request $request)
    {
        $selected_themes = $request->input('theme') ?: [];
        $selected_audiences = $request->input('audience') ?: [];
        $years = [2019, 2018, 2017, 2016, 2015, 2014];
        $selected_year = $request->input('year') ?: 2019;
        $selectedYear = $request->input('year') ?: 2019;

        $country = Country::where('iso','=',session('country_iso'))->first();

        return view('event.search', compact(['selected_themes','selected_audiences','years','selected_year','selectedYear','country']));
    }

    public function searchPOST(EventFilters $filters, Request $request)
    {
        $events = $this->getEvents($filters);

        if ($request->input('page')) {
            $result = [$events];
        } else {
            Log::info('no page');
            $eventsMap = $this->getAllEventsToMap($filters);
            $result = [$events, $eventsMap];
        }

        return $result;
    }

    protected function getEvents(EventFilters $filters)
    {

        $events = Event::where('status','like','APPROVED')
            ->filter($filters)
            ->orderBy('start_date','asc');

        return $events->paginate(12);
    }

    protected function getAllEventsToMap(EventFilters $filters)
    {

        Log::info('coucou');
        $events = Event::where('status','like','APPROVED')
            ->filter($filters)
            ->get();

        Log::info('before transform');
        $events = $this->eventTransformer->transformCollection($events);
        Log::info('after transform');
        $events = $events->groupBy('country');
        Log::info('after groupBy');


        Log::info($events);
        return $events;
    }
}
