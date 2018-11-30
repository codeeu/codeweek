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
    protected $filters = ['country_iso', 'q', 'theme', 'audience','year', 'creator_id'];

    public function __construct(Request $request)
    {
        if (is_null($request->input('year'))) {
            $request->merge(['year' => Carbon::now()->year]);
        }

        if (is_null($request->input('country_iso')) && !is_null(session('country_iso'))) {
            $request->merge(['country_iso' => session('country_iso')]);
        }
        parent::__construct($request);
    }

    /**
     * Filter the query by country
     *
     * @param  string $country_iso
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function country_iso($country_iso)
    {
        if ($country_iso== "") return;
        $result = $this->builder->where('country_iso', $country_iso);
        return $result;
    }

    protected function year($year)
    {

            return $this->builder->whereYear('start_date', '=', $year);

    }

    protected function creator_id($creator_id)
    {
        return $this->builder->where('creator_id', '=', $creator_id);

    }

    protected function q($q)
    {
        return $this->builder->where('title', 'LIKE', "%{$q}%");

    }

    protected function theme($themes)
    {

        return $this->builder
            ->leftJoin('event_theme', 'events.id', "=", "event_theme.event_id")
            ->whereIn('event_theme.theme_id', $themes);


    }

    protected function audience($audiences)
    {

        return $this->builder
            ->leftJoin('audience_event', 'events.id', "=", "audience_event.event_id")
            ->whereIn('audience_event.audience_id', $audiences);

    }
}