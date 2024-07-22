<?php

namespace App\Nova\Filters;

use App\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class UserCountry extends Filter
{
    /**
     * Apply the filter to the given query.
     *
     * @param  mixed  $value
     */
    public function apply(Request $request, $query, $value): Builder
    {
        return $query->where('country_iso', $value);
    }

    /**
     * Get the filter's available options.
     */
    public function options(Request $request): array
    {

        return Country::withEvents()->pluck('iso', 'name')->toArray();
    }
}
