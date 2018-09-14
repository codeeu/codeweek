<?php

namespace App\Http\Controllers;


use App\Country;
use App\Event;
use App\Filters\UserFilters;
use App\Helpers\EventHelper;
use App\Http\Requests\EventRequest;
use App\Queries\EventsQuery;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{



    /**
     * EventController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'my']);
    }


    public function my()
    {

        $events = Event::where('creator_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(6);

        return view('event.my', compact('events'));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $years = [2018, 2017, 2016, 2015, 2014];

        $selectedYear = $request->input("year") ? $request->input("year") : Carbon::now()->year;

        $iso_country_of_user = User::getGeoIPData()->iso_code;

        $ambassadors = User::role('ambassador')->where("country_iso","=",$iso_country_of_user)->get();

        return view('events')->with([
            'events' => $this->eventsNearMe(),
            'years' => $years,
            'selectedYear' => $selectedYear,
            'countries' => Country::withActualYearEvents(),
            'current_country_iso' => $iso_country_of_user,
            'ambassadors' => $ambassadors
        ]);
    }

    private function eventsNearMe()
    {
        $geoip = User::getGeoIPData();
        return EventHelper::getCloseEvents($geoip->lon, $geoip->lat);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        $request->session()->flush();
        return view('event.add');
    }

    public function search()
    {
        $events = Event::all();
        return view('event.search', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {



        $event = EventsQuery::store($request);

        $event->notifyAmbassadors();

        Mail::to(auth()->user()->email)->queue(new \App\Mail\EventRegistered($event, auth()->user()));

        return view('event.thankyou', compact('event'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

        if ($event->status != "APPROVED"){
            $this->authorize('view', $event);
        }


        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $t = $event->tags()->pluck('name')->toArray();

        $tags = implode(",", $t);
        $selected_themes = $event->themes()->pluck('id')->toArray();
        $selected_audiences = $event->audiences()->pluck('id')->toArray();

        return view('event.edit', compact(['event','tags','selected_themes','selected_audiences']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {


        $this->authorize('edit', $event);

        EventsQuery::update($request, $event);

        return view('event.show', compact('event'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function approve(Event $event)
    {

        $this->authorize('approve', $event);

        $data = ['status' => "APPROVED", 'approved_by' => auth()->user()->id];

        if (empty($event->codeweek_for_all_participation_code)){
            $codeweek_4_all_generated_code = 'cw' . Carbon::now()->format('y') . '-' . str_random(5);
            $data['codeweek_for_all_participation_code'] = $codeweek_4_all_generated_code;
        }

        $event->update($data);

        Mail::to($event->owner->email)->queue(new \App\Mail\EventApproved($event, $event->owner));

    }

    public function reject(Event $event)
    {

        $this->authorize('approve', $event);

        $data = ['status' => "REJECTED", 'approved_by' => auth()->user()->id];

        $event->update($data);


    }
}
