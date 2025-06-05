<?php

namespace App\Queries;

use App\Audience;
use App\Event;
use App\Tag;
use App\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Country;

class EventsQuery
{
    private static function getRandomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public static function store(Request $request)
    {

        $request['status'] = 'PENDING';

        $request['slug'] = str_slug($request['title'], '-');

        if (strlen($request['slug']) == 0) {
            abort(503, 'Title error');
        }

        if (!isset($request['participants_count'])) {
            $request['participants_count'] = (int) $request['males_count'] + (int) $request['females_count'] + (int) $request['other_count'];
            if ($request['participants_count'] > 0) {
                $request['percentage_of_females'] = number_format((int) $request['females_count'] / (int) $request['participants_count'] * 100, 2);
            }
        }

        $request['pub_date'] = Carbon::now();
        $request['created'] = Carbon::now();
        $request['updated'] = Carbon::now();
        $request['creator_id'] = Auth::user()->id;

        $request['theme'] = explode(',', $request['theme']);
        $request['audience'] = explode(',', $request['audience']);

        if (is_null($request['location']) && ($request['activity_type'] == 'open-online' || $request['activity_type'] == 'invite-online')) {
            $request['location'] = 'online';
            $request['geoposition'] = '0,0';
        }

        if (is_null($request['geoposition'])) {
            $request['geoposition'] = '0,0';
        }

        $request['latitude'] = explode(',', $request['geoposition'])[0];
        $request['longitude'] = explode(',', $request['geoposition'])[1];

        if (empty($request['codeweek_for_all_participation_code'])) {
            $codeweek_4_all_generated_code = 'cw'.Carbon::now()->format('y').'-'.str_random(5);
            $request['codeweek_for_all_participation_code'] = $codeweek_4_all_generated_code;
        }

        if (!empty($request['activity_format']) && is_string($request['activity_format'])) {
            $request['activity_format'] = explode(',', $request['activity_format']);
        }
        
        if (!empty($request['ages']) && is_string($request['ages'])) {
            $request['ages'] = explode(',', $request['ages']);
        }
        
        $event = Event::create($request->toArray());

        if (! empty($request['tags'])) {
            foreach (explode(',', $request['tags']) as $item) {
                $tag = Tag::firstOrCreate([
                    'name' => trim($item),
                    'slug' => str_slug(trim($item)),
                ]);

                $event->tags()->save($tag);
            }
        }

        foreach ($request['theme'] as $theme) {

            $theme = Theme::where('id', $theme)->first();
            $event->themes()->save($theme);
        }

        foreach ($request['audience'] as $audience) {
            $audience = Audience::where('id', $audience)->first();
            $event->audiences()->save($audience);
        }

        if ($event->geoposition == '0,0') {
            $event->relocate();
        }

        return $event;
    }

    public static function update(Request $request, Event $event)
    {

        //dd($event->status);

        $request['latitude'] = explode(',', $request['geoposition'])[0];
        $request['longitude'] = explode(',', $request['geoposition'])[1];

        if (!isset($request['participants_count'])) {
            $request['participants_count'] = (int) $request['males_count'] + (int) $request['females_count'] + (int) $request['other_count'];
            if ($request['participants_count'] > 0) {
                $request['percentage_of_females'] = number_format((int) $request['females_count'] / (int) $request['participants_count'] * 100, 2);
            }
        }

        //In order to appear again in the list for the moderators
        if ($event->status == 'REJECTED') {
            $request['status'] = 'PENDING';
        }

        if (!empty($request['activity_format']) && is_string($request['activity_format'])) {
            $request['activity_format'] = explode(',', $request['activity_format']);
        }
        
        if (!empty($request['ages']) && is_string($request['ages'])) {
            $request['ages'] = explode(',', $request['ages']);
        }

        $event->update($request->toArray());

        $request['theme'] = explode(',', $request['theme']);
        $request['audience'] = explode(',', $request['audience']);

        $tagsArray = [];
        foreach (explode(',', $request['tags']) as $item) {
            $tag = Tag::firstOrCreate([
                'name' => trim($item),
                'slug' => str_slug(trim($item)),
            ]);
            array_push($tagsArray, $tag->id);
        }

        $event->tags()->sync($tagsArray);
        $event->themes()->sync($request['theme']);
        $event->audiences()->sync($request['audience']);

        return $event;
    }

    public static function trigger(?Country $country, $status = null)
    {
        $query = Event::query()
            ->where(function($query) {
                $query->where('status', 'APPROVED')
                      ->orWhere('status', 'FEATURED');
            })
            ->orderBy('start_date', 'asc');

        if ($country) {
            $query->where('country_iso', $country->iso);
        }

        if ($status) {
            $query->where('status', $status);
        }

        return $query->get();
    }
}
