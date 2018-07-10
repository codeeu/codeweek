<?php

namespace App\Http\Controllers;


use App\Event;
use App\Http\Requests\EventRequest;
use App\Queries\EventsQuery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        //
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

        return view('event.edit', compact(['event','tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param  \App\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {


        $this->authorize('edit', $event);

        EventsQuery::update($request, $event);


        return back();


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

        $event->update(['status' => "APPROVED", 'approved_by' => auth()->user()->id]);

    }

    public function reject(Event $event)
    {

        $this->authorize('approve', $event);

        $event->update(['status' => "REJECTED", 'approved_by' => auth()->user()->id]);


    }
}
