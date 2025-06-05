<?php

namespace App\Http\Controllers;

use App\Country;
use App\Event;
use App\Helpers\EventHelper;
use App\Http\Requests\EventRequest;
use App\Queries\EventsQuery;
use App\Queries\PendingEventsQuery;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class EventController extends Controller
{
    /**
     * EventController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'my']);
    }

    public function my(): View
    {
        $events = Event::where('creator_id', '=', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('event.my', compact('events'));
    }

    //    public function myreportable()
    //    {
    //
    //        $events = Event::where('creator_id', '=', Auth::user()->id)
    //            ->whereNull('reported_at')
    //            ->orderBy('created_at', 'desc')->paginate(6);
    //
    //        return view('event.myreportable', compact('events'));
    //
    //    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        //Redirect if we have locations
        $countries = \App\Country::all()->sortBy('name');

        $themes = \App\Theme::orderBy('order', 'asc')->get();

        $languages = Arr::sort(Lang::get('base.languages'));

        $leading_teachers = $this->getLeadingTeachersTagsArray();

        if ($request->get('location')) {
            $location = auth()->user()->locations()->where('id', $request->get('location'))->firstOrFail();

            return view('event.add', compact(['countries', 'themes', 'languages', 'location', 'leading_teachers']));
        }

        if (! auth()->user()->locations->isEmpty()) {
            if (! $request->get('skip')) {
                return redirect(route('activities-locations'));
            }
        }

        return view('event.add', compact(['countries', 'themes', 'languages', 'leading_teachers']));
    }

    public function search(): View
    {
        $events = Event::all();

        return view('event.search', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request): View
    {
        $user = auth()->user();

        $user->privacy = true;

        $user->save();

        $event = EventsQuery::store($request);

        $event->notifyAmbassadors();

        $event->createLocation();

        Mail::to(auth()->user()->email)->queue(
            new \App\Mail\EventRegistered($event, auth()->user())
        );

        return view('event.thankyou', compact('event'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

        if ($event->status == 'PENDING' && ! Auth::check()) {
            return redirect(route('login'));
        } elseif ($event->status != 'APPROVED') {
            $this->authorize('view', $event);
        }

        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event): View
    {
        $this->authorize('edit', $event);

        $t = $event
            ->tags()
            ->pluck('name')
            ->toArray();

        $countries = \App\Country::all()->sortBy('name');

        $tags = implode(',', $t);
        $selected_themes = $event
            ->themes()
            ->pluck('id')
            ->toArray();
        $selected_themes = implode(',', $selected_themes);
        $selected_audiences = $event
            ->audiences()
            ->pluck('id')
            ->toArray();
        $selected_audiences = implode(',', $selected_audiences);
        $selected_country = optional($event->country()->first())->iso;
        $selected_language = is_null($event->language)
            ? 'en'
            : $event->language;

        $languages = Arr::sort(Lang::get('base.languages'));

        $leading_teachers = $this->getLeadingTeachersTagsArray();

        return view(
            'event.edit',
            compact([
                'event',
                'tags',
                'selected_themes',
                'selected_audiences',
                'countries',
                'selected_country',
                'languages',
                'selected_language',
                'leading_teachers',
            ])
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event): View
    {
        $this->authorize('edit', $event);

        EventsQuery::update($request, $event);

        return view('event.show', compact('event'));
    }

    /**
     * Remove the specified resource from storage.
     *
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

    public function approveAll($country): RedirectResponse
    {
        $object = (object) ['iso' => $country];

        $events = PendingEventsQuery::trigger($object);

        foreach ($events as $event) {
            $this->authorize('approve', $event);

            $event->approve();
        }

        return redirect('pending/'.$country);
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

    private function sendDeletionEmail($event)
    {

        if ($event->creator_id == auth()->id()) {
            return;
        }

        if (! empty($event->user_email)) {
            Mail::to($event->user_email)->queue(
                new \App\Mail\EventDeleted()
            );
        } elseif (! is_null($event->owner) && ! is_null($event->owner->email)) {
            Mail::to($event->owner->email)->queue(
                new \App\Mail\EventDeleted()
            );
        }

    }

    public function delete(Request $request, Event $event)
    {
        $this->authorize('delete', $event);
        $this->sendDeletionEmail($event);
        $event->delete();

        if ($request->ajax()) {
            $redirectUrl = '/my';

            if (
                auth()
                    ->user()
                    ->can('approve', $event)
            ) {
                $redirectUrl = '/pending';
            }

            return ['redirectUrl' => $redirectUrl];
        }

        return redirect()
            ->route('my_events')
            ->with('flash', 'Your event has been deleted!');
    }

    public function getLeadingTeachersTagsArray(): array
    {
        $leading_teachers = User::role('leading teacher')
            ->select('tag')
            ->whereNotNull('tag')
            ->orderBy('tag')
            ->get()
            ->toArray();

        $leading_teachers = Arr::pluck($leading_teachers, 'tag');

        return $leading_teachers;
    }
}
