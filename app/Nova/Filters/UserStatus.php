<?php

namespace App\Nova\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class UserStatus extends Filter
{
    /**
     * Apply the filter to the given query.
     *
     * @param  mixed  $value
     */
    public function apply(Request $request, $query, $value): Builder
    {
        return $query->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.role_id', '=', $value)
            ->select('users.*');
    }

    /**
     * Get the filter's available options.
     */
    public function options(Request $request): array
    {
        return [
            'Administrator' => 5,
            'Ambassador' => 3,
        ];
    }
}
