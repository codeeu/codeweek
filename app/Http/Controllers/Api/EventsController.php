<?php

namespace App\Http\Controllers\Api;


use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Transformers\EventTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\Event as EventResource;


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

        $year = $request->input("year") ? $request->input("year") : "2018";

        $events = Event::getByYear($year);

        $events = $this->eventTransformer->transformCollection($events);


        if ($request->wantsJson()) {
            return response()->json($events, 200);
        }

        return $events;


    }

    public function detail(Request $request){

        $event_id = $request->input("id");

        $event = Event::where('id',$event_id)->first();

        return new EventResource($event);

    }

    public function closest(Request $request){

        $event_id = $request->input("id");

        $event = Event::where('id',$event_id)->first();
        $events = $event->getClosest();
        return $events;

        //return new EventResource($event);

    }


}
