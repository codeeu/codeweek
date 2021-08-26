<?php

namespace App\Http\Controllers\Api;

use App\Certificate;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Transformers\EventTransformer;
use App\Importer;
use App\Importers\Eeducation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\Event as EventResource;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class EventsController extends Controller {
    protected $eventTransformer;

    /**
     * EventController constructor.
     * @param $eventTransformer
     */
    public function __construct(EventTransformer $eventTransformer) {
        $this->eventTransformer = $eventTransformer;
    }

    public function list(Request $request) {
        $year = $request->input('year')
            ? $request->input('year')
            : Carbon::now()->year;

        if (Cache::has('events' . $year)) {
            $events = Cache::get('events' . $year);
        } else {
            $events = Event::getByYear($year);

            $events = $this->eventTransformer->transformCollection($events);

            $events = $events->groupBy('country');

            if ($year == Carbon::now()->year) {
                Cache::add(
                    'events' . $year,
                    $events,
                    (env('CACHE_MINUTES_CURRENT_YEAR') * 60) | 5
                );
            } else {
                Cache::forever('events' . $year, $events);
            }
        }

        if ($request->wantsJson()) {
            return response()->json($events, 200);
        }

        return $events;
    }

    public function detail(Request $request) {
        $event_id = $request->input('id');

        $event = Event::where('id', $event_id)->first();

        if ($event->picture == '') {
            $event->picture =
                'event_picture/logo_gs_2016_07703ca0-7e5e-4cab-affb-4de93e3f2497.png';
        }

        return new EventResource($event);
    }

    public function closest(Request $request) {
        $event_id = $request->input('id');

        $event = Event::where('id', $event_id)->first();
        $events = $event->getClosest();
        return $events;

        //return new EventResource($event);
    }

    public function eeducation() {
        return Importer::where('website', '=', 'eeducation')
            ->with('event')
            ->with('event.owner')
            ->get();
    }

    public function geobox(Request $request) {
        $lat1 = $request->input('lat1');
        $long1 = $request->input('long1');
        $lat2 = $request->input('lat2');
        $long2 = $request->input('long2');

        if (is_null($request->input('year'))) {
            $year = Carbon::now()->year;
        } else {
            $year = $request->input('year');
        }

        $box = [];

        // ['latitude', '>=', $lat1],
        // ['latitude', '<=', $lat2],
        // ['longitude', '>=', $long1],
        // ['longitude', '<=', $long2]

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
            Event::where($box)
                ->whereYear('end_date', '=', $year)
                ->get()
        );

        return $collection;
    }

    //    public function generate(Event $event)
    //    {
    //        $this->authorize('report', $event);
    //        if (!is_null($event->certificate_url)) {
    //            return $event->certificate_url;
    //        }
    //        return (new Certificate($event))->generate();
    //    }
}
