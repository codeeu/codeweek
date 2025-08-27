<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class ResourceLanguage extends Resource
{
    public static $group = 'Resources';

    public static function label()
    {
        return 'Languages';
    }

    public static function singularLabel()
    {
        return 'Language';
    }

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\ResourceLanguage::class;

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
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            BelongsToMany::make('ResourceItem', 'items'),
            Text::make('name')->sortable(),
            Text::make('code')->sortable(),
            Number::make('Position')->sortable(),
            Boolean::make('Teach')->sortable(),
            Boolean::make('Learn')->sortable(),
            Boolean::make('Active')
                ->hideWhenCreating()->hideFromIndex(),
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
}
