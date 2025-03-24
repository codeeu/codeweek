<?php

/**
 * @Author: Bernard Hanna
 * @Date:   2025-03-21 19:14:36
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2025-03-24 10:37:09
 */


namespace App\Http\Controllers;

use App\Country;
use App\Event;
use App\Filters\EventFilters;
use App\Http\Transformers\EventTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class SearchController extends Controller
{
    protected $eventTransformer;

    /**
     * EventController constructor.
     */
    public function __construct(EventTransformer $eventTransformer)
    {
        $this->eventTransformer = $eventTransformer;
    }

    public function index()
    {
        return view('static.search');
    }

    public function search(Request $request): View
    {

        $query = $request->input('q', '');
        $selected_year = $request->input('year', Carbon::now()->year);

        $country_iso = $request->input('country_iso', null);
        $tag = $request->input('tag', '');

        $selected_country = [];

        if (! is_null($country_iso)) {
            $country = Country::where('iso', $country_iso)->first();
            if ($country) {
                $country->translation = __('countries.'.$country->name);
                $selected_country[] = $country;
            }

        }

        $current_year = Carbon::now()->year;
        $years = [];
        for ($year = $current_year; $year >= 2014; $year--) {
            $years[] = $year;
        }

        return view('event.search', compact(['query', 'years', 'selected_country', 'selected_year', 'tag']));
    }

    public function searchPOST(EventFilters $filters, Request $request)
    {
        $events = $this->getEvents($filters);

        //Log::info($request->input('page'));
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

        $events = Event::where('status', 'like', 'APPROVED')
            ->filter($filters)
            ->orderBy('start_date')
            ->get()
            ->groupBy(function ($event) {
                if ($event->start_date <= Carbon::today()) {
                    return 'past';
                }

                return 'future';
            });

        if (is_null($events->get('future')) || is_null($events->get('past'))) {
            return $events->flatten()->paginate(12);
        }

        return $events->get('future')->merge($events->get('past'))->paginate(12);

    }

    protected function getAllEventsToMap(EventFilters $filters)
    {

        $flattened = Arr::flatten($filters->getFilters());
        $filtered = array_filter($flattened, fn($v) => $v !== null && $v !== '');
        $composed_key = implode(',', $filtered);

        if (empty($composed_key)) {
            Log::info('Skipping cache due to empty composed_key');
            return Event::where('status', 'APPROVED')
                ->filter($filters)
                ->get()
                ->groupBy('country');
        }

        $value = Cache::get($composed_key, function () use ($composed_key, $filters) {
            Log::info("Building cache [{$composed_key}]");
            $events = Event::where('status', 'like', 'APPROVED')
                ->filter($filters)
                ->get();

            $events = $this->eventTransformer->transformCollection($events);

            $events = $events->groupBy('country');

            Cache::put($composed_key, $events, 5 * 60);

            return $events;
        });

        Log::info("Serving from cache [{$composed_key}]");

        return $value;

    }
}
