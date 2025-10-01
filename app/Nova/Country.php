<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Country extends Resource
{

    public static $group = 'Community';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Country::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'iso',
    ];

    //public static $displayInNavigation = false;

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(Request $request): array
    {
        return [
            Text::make('Name')->sortable(),
            Text::make('Iso')->sortable(),
            Text::make('Facebook')
                ->rules('nullable', 'url')
                ->sortable(),
            Text::make('Website')
                ->rules('nullable', 'url')
                ->sortable(),

        ];
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(Request $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(Request $request): array
    {
        return [];
    }

    public static function availableForNavigation(Request $request)
    {
        return $request->user()->isAdmin() || $request->user()->isAmbassador();
    }

    public static function indexQuery(NovaRequest $request, $query)
    {

        if ($request->user()->isAdmin()) {
            return $query;
        }

        if ($request->user()->isAmbassador()) {
            return $query
                ->where('iso', '=', 'FR');

        }

    }
}
