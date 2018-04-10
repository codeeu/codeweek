<?php

namespace App\Http\Controllers;

use App\Audience;
use App\Event;
use App\Tag;
use App\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{


    /**
     * EventController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','my']);
    }


    public function my()
    {

        $events = Event::where('creator_id', '=', Auth::user()->id)->orderBy('created_at','desc')->paginate(6);
        return view('event.my',compact('events'));

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

    public function search(){
        $events = Event::all();
        return view('event.search', compact('events'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'organizer'=>'required',
            'location'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'audience'=>'required',
            'theme'=>'required',
            'country_iso'=>'required',
            'contact_person'=>'required',
//            'tags'=>'required'
        ],[
            'title.required' => 'Please enter a title for your event.',
            'description.required' => 'Please write a short description of what the event is about.',
            'organizer.required' => 'Please enter an organizer.',
            'location.required' => 'Please enter a location.',
            'start_date.required' => 'Please enter a valid date and time (example: 2014-10-22 18:00).',
            'end_date.required' => 'Please enter a valid date and time (example: 2014-10-22 18:00).',
            'audience.required' => 'If unsure, choose Other and provide more information in the description.',
            'theme.required' => 'If unsure, choose Other and provide more information in the description.',
            'country_iso.required' => 'The event\'s location should be in Europe.',
//            'tags.required' => 'Please type in some tags to categorize the event',
            'contact_person.required' => 'Please enter a valid email address.',

        ]);

        $request['status'] = 'PENDING';
        $request['geoposition'] = $request['geoposition_0'] . ',' . $request['geoposition_1'];

        $request['slug'] = str_slug($request['title'], '-');

        $request['pub_date'] = Carbon::now();
        $request['created'] = Carbon::now();
        $request['updated'] = Carbon::now();
        $request['creator_id'] = Auth::user()->id;

        $event = Event::create($request->toArray());

        foreach (explode(",",$request['tags']) as $item) {
            $tag = Tag::create([
                "name"=>$item,
                "slug"=>str_slug($item)
            ]);

            $event->tags()->save($tag);
        }

        foreach ($request['theme'] as $theme) {
            $theme = Theme::where('id', $theme)->first();
            $event->themes()->save($theme);
        }

        foreach ($request['audience'] as $audience) {
            $audience = Audience::where('id', $audience)->first();
            $event->audiences()->save($audience);
        }

        return view('event.thankyou', compact('event'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
