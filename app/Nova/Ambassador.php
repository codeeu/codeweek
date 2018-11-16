<?php

namespace App\Nova;


use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasOne;

use Illuminate\Http\Request;

use Laravel\Nova\Fields\Text;

use Laravel\Nova\Fields\Password;
use Laravel\Nova\Http\Requests\NovaRequest;

class Ambassador extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\User';

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
        'id', 'firstname', 'lastname', 'username', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [


            Boolean::make('Is Ambassador ?', 'ambassador'),


            BelongsTo::make('Country'),


            Text::make('Name', function(){
                return $this->getName();
            })
                ->rules('required', 'max:255')
                ->onlyOnIndex(),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}')
                ->hideFromIndex(),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:6')
                ->updateRules('nullable', 'string', 'min:6'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new Filters\UserCountry,
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }

    public static function availableForNavigation(Request $request)
    {

        return $request->user()->isAdmin();
    }

    public static function indexQuery(NovaRequest $request, $query)
    {

        //return $query->where('country_iso', "=", $request->user()->country_iso);

        return $query->join('model_has_roles', 'users.id', "=", "model_has_roles.model_id")
            ->where('model_has_roles.role_id', "=", 3)
            ->select('users.*');

    }
}
