<?php

namespace App\Queries;

use App\Audience;
use App\Event;
use App\Tag;
use App\Theme;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventsQuery
{
    public static function store(Request $request)
    {



        $request['status'] = 'PENDING';

        $request['slug'] = str_slug($request['title'], '-');

        $request['pub_date'] = Carbon::now();
        $request['created'] = Carbon::now();
        $request['updated'] = Carbon::now();
        $request['creator_id'] = Auth::user()->id;

        $request['latitude'] = explode(",", $request['geoposition'])[0];
        $request['longitude'] = explode(",", $request['geoposition'])[1];

        $request['theme'] = explode(',', $request['theme']);
        $request['audience'] = explode(',', $request['audience']);

        if (empty($request['codeweek_for_all_participation_code'])){
            $codeweek_4_all_generated_code = 'cw' . Carbon::now()->format('y') . '-' . str_random(5);
            $request['codeweek_for_all_participation_code'] = $codeweek_4_all_generated_code;
        }

        $iso = CountriesQuery::getCountryIsoPerName($request['country_iso']);

        $request['country_iso'] = $iso;

        $event = Event::create($request->toArray());


        if (!empty($request['tags'])) {
            foreach (explode(",", $request['tags']) as $item) {
                $tag = Tag::create([
                    "name" => trim($item),
                    "slug" => str_slug(trim($item))
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


        return $event;
    }

    public static function update(Request $request, Event $event)
    {



        $request['latitude'] = explode(",", $request['geoposition'])[0];
        $request['longitude'] = explode(",", $request['geoposition'])[1];

        $iso = CountriesQuery::getCountryIsoPerName($request['country_iso']);

        $request['country_iso'] = $iso;

        $event->update($request->toArray());

        $request['theme'] = explode(',', $request['theme']);
        $request['audience'] = explode(',', $request['audience']);

        $tagsArray = [];
        foreach (explode(",", $request['tags']) as $item) {
            $tag = Tag::firstOrCreate([
                "name" => trim($item),
                "slug" => str_slug(trim($item))
            ]);
            array_push($tagsArray, $tag->id);
        }

        $event->tags()->sync($tagsArray);
        $event->themes()->sync($request['theme']);
        $event->audiences()->sync($request['audience']);

        return $event;
    }


}