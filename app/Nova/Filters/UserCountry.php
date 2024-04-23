<?php

namespace App\Nova\Filters;

use App\Country;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class UserCountry extends Filter
{
    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('country_iso', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @return array
     */
    public function options(Request $request)
    {

        return Country::withEvents()->pluck('iso', 'name');
    }
}
