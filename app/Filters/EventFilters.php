<?php

namespace App\Filters;

use App\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'countries',
        'query',
        'themes',
        'audiences',
        'types',
        'year',
        'creator_id',
        'tag',
        'formats',
        'ages',
        'languages',
        'start_date'
    ];

    public function __construct(Request $request)
    {
        /*        if (is_null($request->input('year'))) {
                    $request->merge(['year' => Carbon::now()->year]);
                }*/

        if (is_null($request->input('country_iso')) && ! is_null(session('country_iso'))) {
            $request->merge(['country_iso' => session('country_iso')]);
        }
        parent::__construct($request);
    }

    /**
     * Filter the query by country
     *
     * @param  string  $country_iso
     */
    protected function countries($countries): Builder
    {
        if (empty($countries)) {
            return $this->builder;
        }

        $countriesIn = collect($countries)->pluck('iso')->all();

        $result = $this->builder->whereIn('country_iso', $countriesIn);

        return $result;
    }

    protected function year($year)
    {
        return $this->builder->whereYear('end_date', '=', $year);
    }

    protected function creator_id($creator_id)
    {
        return $this->builder->where('creator_id', '=', $creator_id);
    }

    protected function query($query)
    {

        if (empty($query)) {
            return;
        }

        return $this->builder->where(function ($queryInside) use ($query) {
            $queryInside->where('title', 'LIKE', "%$query%")
                ->orWhere('description', 'LIKE', "%$query%")
                ->orWhere('codeweek_for_all_participation_code', 'LIKE', "%$query%");
        });
    }

    protected function themes($themes)
    {

        if (empty($themes)) {
            return;
        }

        $themesIds = collect($themes)->pluck('id')->all();

        return $this->builder
            ->leftJoin('event_theme', 'events.id', '=', 'event_theme.event_id')
            ->whereIn('event_theme.theme_id', $themesIds);
    }

    protected function tag($tag)
    {

        if (empty($tag)) {
            return;
        }

        $selectedTag = Tag::where('slug', Str::slug($tag))->first();

        if (empty($selectedTag)) {
            return $this->query($tag);
        }

        return $this->builder
            ->leftJoin('event_tag', 'events.id', '=', 'event_tag.event_id')
            ->where('event_tag.tag_id', $selectedTag->id);
    }

    protected function audiences($audiences)
    {

        if (empty($audiences)) {
            return;
        }

        $audiencesIds = collect($audiences)->pluck('id')->all();

        return $this->builder
            ->leftJoin('audience_event', 'events.id', '=', 'audience_event.event_id')
            ->whereIn('audience_event.audience_id', $audiencesIds);
    }

    protected function types($types)
    {

        if (empty($types)) {
            return;
        }

        $keys = collect($types)->pluck('id')->all();

        $result = $this->builder->whereIn('activity_type', $keys);

        return $result;
    }

    protected function start_date($start_date)
    {
        if (!empty($start_date)) {
            return $this->builder->where('start_date', '>=', $start_date);
        }
        return;
    }

    protected function languages($languages)
    {

        if (empty($languages)) {
            return;
        }

        $keys = collect($languages)->pluck('id')->all();

        $result = $this->builder->whereIn('language', $keys);

        return $result;
    }

    protected function formats($formats)
    {
        if (empty($formats)) {
            return;
        }

        $keys = collect($formats)->pluck('id')->all();

        $this->builder->where(function ($query) use ($keys) {
            foreach ($keys as $key) {
                $query->orWhereRaw("JSON_CONTAINS(activity_format, '\"$key\"')");
            }
        });
    }

    protected function ages($ages)
    {
        if (empty($ages)) {
            return;
        }

        $keys = collect($ages)->pluck('id')->all();

        $this->builder->where(function ($query) use ($keys) {
            foreach ($keys as $key) {
                $query->orWhereRaw("JSON_CONTAINS(ages, '\"$key\"')");
            }
        });
    }
}
