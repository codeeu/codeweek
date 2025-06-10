<?php

namespace App\Http\Controllers\Api;

use App\Certificate;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Resources\Event as EventResource;
use App\Http\Transformers\EventTransformer;
use App\Importer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EventsController extends Controller
{
    protected $eventTransformer;

    /**
     * EventController constructor.
     */
    public function __construct(EventTransformer $eventTransformer)
    {
        $this->eventTransformer = $eventTransformer;
    }

    public function event(Event $event)
    {

        return new \App\Http\Resources\EventResource($event);

    }

    public function list(Request $request)
    {
        $year = $request->input('year')
            ? $request->input('year')
            : Carbon::now()->year;

        if (Cache::has('events'.$year)) {
            $events = Cache::get('events'.$year);
        } else {
            $events = Event::getByYear($year);

            $events = $this->eventTransformer->transformCollection($events);

            $events = $events->groupBy('country');

            if ($year == Carbon::now()->year) {
                Cache::add(
                    'events'.$year,
                    $events,
                    300
                );
            } else {
                Cache::forever('events'.$year, $events);
            }
        }

        if ($request->wantsJson()) {
            return response()->json($events, 200);
        }

        return $events;
    }
    public function detail(Request $request)
    {
        $event_id = $request->input('id');

        $event = Event::where('id', $event_id)->first();

        if ($event->picture == '') {
            $event->picture =
                'event_picture/logo_gs_2016_07703ca0-7e5e-4cab-affb-4de93e3f2497.png';
        }

        return new EventResource($event);
    }

    public function closest(Request $request)
    {
        $event_id = $request->input('id');

        $event = Event::where('id', $event_id)->first();
        $events = $event->getClosest();

        return $events;

        //return new EventResource($event);
    }

    public function eeducation()
    {
        return Importer::where('website', '=', 'eeducation')
            ->with('event')
            ->with('event.owner')
            ->get();
    }

    public function germany(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|numeric',
        ]);

        $collection = \App\Http\Resources\EventResource::collection(
            Event::where('status', 'like', 'APPROVED')
                ->where('country_iso', 'DE')
                ->whereYear('end_date', '=', $validated['year'])
                ->get()
        );

        return $collection;
    }
    public function geobox(Request $request)
    {
        $validated = $request->validate([
            'lat1' => 'required|numeric',
            'long1' => 'required|numeric',
            'lat2' => 'required|numeric',
            'long2' => 'required|numeric',
            'year' => 'nullable|sometimes|numeric',
        ]);

        $lat1 = $validated['lat1'];
        $long1 = $validated['long1'];
        $lat2 = $validated['lat2'];
        $long2 = $validated['long2'];

        if (abs($lat1 - $lat2) > 10 || abs($long1 - $long2) > 10) {
            return response()->json(['error' => 'Area is too wide'], 500);
        }

        if (isset($validated['year'])) {
            $year = (int) $validated['year'];
        } else {
            $year = Carbon::now()->year;
        }

        $box = [];

        if ($lat1 < $lat2) {
            $box[] = ['latitude', '>=', $lat1];
            $box[] = ['latitude', '<=', $lat2];
        } else {
            $box[] = ['latitude', '<=', $lat1];
            $box[] = ['latitude', '>=', $lat2];
        }

        if ($long1 < $long2) {
            $box[] = ['longitude', '>=', $long1];
            $box[] = ['longitude', '<=', $long2];
        } else {
            $box[] = ['longitude', '<=', $long1];
            $box[] = ['longitude', '>=', $long2];
        }

        $collection = \App\Http\Resources\EventResource::collection(
            Event::where('status', 'like', 'APPROVED')
                ->where($box)
                ->whereYear('end_date', '=', $year)
                ->get()
        );

        return $collection;
    }
}
