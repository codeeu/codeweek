<?php

namespace App\Http\Controllers\Api;


use App\Certificate;
use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Transformers\EventTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\Event as EventResource;
use Illuminate\Support\Facades\Cache;


class EventsController extends Controller
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


    public function list(Request $request)
    {

        $year = $request->input("year") ? $request->input("year") : Carbon::now()->year;

        if (Cache::has('events' . $year)) {

            $events = Cache::get('events' . $year);

        }else {

            $events = Event::getByYear($year);

            $events = $this->eventTransformer->transformCollection($events);

            $events = $events->groupBy('country');

            if ($year == Carbon::now()->year) {
                Cache::add('events' . $year, $events, env('CACHE_MINUTES_CURRENT_YEAR') | 5);
            }else{
                Cache::forever('events' . $year, $events);
            }

        }


        if ($request->wantsJson()) {
            return response()->json($events, 200);
        }

        return $events;


    }

    public function detail(Request $request)
    {

        $event_id = $request->input("id");

        $event = Event::where('id', $event_id)->first();

        if ($event->picture == ""){
            $event->picture = "event_picture/logo_gs_2016_07703ca0-7e5e-4cab-affb-4de93e3f2497.png";
        }


        return new EventResource($event);

    }

    public function closest(Request $request)
    {

        $event_id = $request->input("id");

        $event = Event::where('id', $event_id)->first();
        $events = $event->getClosest();
        return $events;

        //return new EventResource($event);

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
