<?php

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
                $country->translation = __('countries.' . $country->name);
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
        $paginatedEvents = $this->getPaginatedEvents($filters);

        if ($request->input('page')) {
            return [$paginatedEvents];
        }

        $mapData = $this->transformEventsForMap($filters);

        return [$paginatedEvents, $mapData];
    }

    protected function getPaginatedEvents(EventFilters $filters)
    {
        return Event::where('status', 'APPROVED')
            ->filter($filters)
            ->orderByRaw("start_date > ? desc", [Carbon::today()])
            ->orderBy('start_date')
            ->paginate(12);
    }

    protected function transformEventsForMap(EventFilters $filters)
    {
        $flattened = Arr::flatten($filters->getFilters());
        $filtered = array_filter($flattened, fn($v) => $v !== null && $v !== '');
        $composed_key = 'map_' . implode(',', $filtered);

        return Cache::remember($composed_key, 300, function () use ($filters) {
            $grouped = [];

            Event::select('id', 'geoposition', 'country_iso')
                ->where('status', 'APPROVED')
                ->whereNotNull('geoposition')
                ->where('geoposition', '!=', '')
                ->filter($filters)
                ->cursor()
                ->each(function ($event) use (&$grouped) {
                    $transformed = app(\App\Http\Transformers\EventTransformer::class)->transform($event);
                    $country = $transformed['country'] ?? 'unknown';
                    $grouped[$country][] = $transformed;
                });

            return collect($grouped);
        });
    }
}
