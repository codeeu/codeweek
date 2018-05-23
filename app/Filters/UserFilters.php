<?php

namespace App\Filters;

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
     *
     * @param  string $country_iso
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function country_iso($country_iso)
    {
        //if ($country_iso== "") return;
        $result = $this->builder->where('country_iso', $country_iso);
        return $result;
    }


}