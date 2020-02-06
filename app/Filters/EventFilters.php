<?php

namespace App\Filters;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['countries', 'query', 'themes', 'audiences', 'year', 'creator_id'];

    public function __construct(Request $request)
    {
        /*        if (is_null($request->input('year'))) {
                    $request->merge(['year' => Carbon::now()->year]);
                }*/

        if (is_null($request->input('country_iso')) && !is_null(session('country_iso'))) {
            $request->merge(['country_iso' => session('country_iso')]);
        }
        parent::__construct($request);
    }


    /**
     * Filter the query by country
     *
     * @param string $country_iso
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function countries($countries)
    {
        if (empty($countries)) return;

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

        if (empty($query)) return;

        return $this->builder->where(function ($queryInside) use ($query) {
            $queryInside->where('title', 'LIKE', "%$query%")
                ->orWhere('description', 'LIKE', "%$query%")
                ->orWhere('codeweek_for_all_participation_code', 'LIKE', "%$query%");
        });
    }

    protected function themes($themes)
    {

        if (empty($themes)) return;

        $themesIds = collect($themes)->pluck('id')->all();

        return $this->builder
            ->leftJoin('event_theme', 'events.id', "=", "event_theme.event_id")
            ->whereIn('event_theme.theme_id', $themesIds);


    }

    protected function audiences($audiences)
    {

        if (empty($audiences)) return;

        $audiencesIds = collect($audiences)->pluck('id')->all();

        return $this->builder
            ->leftJoin('audience_event', 'events.id', "=", "audience_event.event_id")
            ->whereIn('audience_event.audience_id', $audiencesIds);

    }
}