<?php

namespace App\Http\Controllers;


use App\ActivityType;
use App\Country;
use App\Event;
use App\Filters\UserFilters;
use App\Helpers\EventHelper;
use App\Http\Requests\EventRequest;
use App\Queries\EventsQuery;
use App\Queries\PendingEventsQuery;
use App\ResourceLanguage;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
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


    public function myreportable()
    {

        $events = Event::where('creator_id', '=', Auth::user()->id)
            ->whereNull('reported_at')
            ->orderBy('created_at', 'desc')->paginate(6);

        return view('event.myreportable', compact('events'));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $years = range(Carbon::now()->year, 2014, -1);

        $selectedYear = $request->input("year") ? $request->input("year") : Carbon::now()->year;

        $iso_country_of_user = User::getGeoIPData()->iso_code;

        $ambassadors = User::role('ambassador')->where("country_iso", "=", $iso_country_of_user)->get();

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

        $countries = \App\Country::all()->sortBy('name');


        $themes = \App\Theme::orderBy('order', 'asc')->get();


        $languages = Arr::sort(Lang::get('base.languages'));

        return view('event.add', compact(['countries', 'themes','languages']));
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


        $user = auth()->user();

        $user->privacy = true;

        $user->save();

        $event = EventsQuery::store($request);

        $event->notifyAmbassadors();

        Mail::to(auth()->user()->email)->queue(new \App\Mail\EventRegistered($event, auth()->user()));

        return view('event.thankyou', compact('event'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

        /*$start_date = Carbon::parse($event->start_date);
        dd($start_date->isoFormat('MMMM Do YYYY, h:mm:ss a'));*/
        //dd(\Carbon\Carbon::now()->firstOfMonth(1)->isoFormat('ddd'));

        if ($event->status != "APPROVED") {
            $this->authorize('view', $event);
        }


        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $t = $event->tags()->pluck('name')->toArray();

        $countries = \App\Country::all()->sortBy('name');

        $tags = implode(",", $t);
        $selected_themes = $event->themes()->pluck('id')->toArray();
        $selected_themes = implode(',', $selected_themes);
        $selected_audiences = $event->audiences()->pluck('id')->toArray();
        $selected_audiences = implode(',', $selected_audiences);
        $selected_country = $event->country()->first()->iso;
        $selected_language = is_null($event->language)?'en':$event->language;

        $languages = Arr::sort(Lang::get('base.languages'));
        //dd($event);

        return view('event.edit', compact(['event', 'tags', 'selected_themes', 'selected_audiences', 'countries', 'selected_country','languages','selected_language']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param \App\Event $event
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
     * @param \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function approve(Event $event)
    {

        $this->authorize('approve', $event);

        $event->approve();

    }

    public function approveAll($country)
    {

        $object = (object)['iso' => $country];

        $events = PendingEventsQuery::trigger($object);

        foreach ($events as $event) {
            $this->authorize('approve', $event);

            $event->approve();
        }

        return redirect('pending/' . $country);

    }

    public function reject(Request $request, Event $event)
    {

        $rejectionText = $request->get('rejectionText', null);

        try {
            $this->authorize('approve', $event);
        } catch (AuthorizationException $e) {
        }

        $event->reject($rejectionText);


    }

    public function delete(Request $request, Event $event)
    {

        $this->authorize('delete', $event);

        $event->delete();

        if($request->ajax()){
            $redirectUrl = "/my";

            if(auth()->user()->can('approve', $event)){
                $redirectUrl = "/pending";
            }

            return ["redirectUrl"=> $redirectUrl];
        }

        return redirect()->route('my_events')->with('flash', 'Your event has been deleted!');



    }
}
