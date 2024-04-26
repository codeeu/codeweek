<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilters extends Filters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = ['country_iso'];

    /**
     * Filter the query by country
     */
    protected function country_iso(string $country_iso): Builder
    {
        //if ($country_iso== "") return;
        $result = $this->builder->where('country_iso', $country_iso);

        return $result;
    }
}
