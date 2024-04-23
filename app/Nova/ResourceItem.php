<?php

namespace App\Nova;

use Ctessier\NovaAdvancedImageField\AdvancedImage;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;

class ResourceItem extends Resource
{
    public static $group = 'Resources';

    public static function label()
    {
        return 'Items';
    }

    public static function singularLabel()
    {
        return 'Resource';
    }

    public static $singularLabel = 'Resource Item';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\ResourceItem';

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
        'name', 'description', 'source',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            BelongsToMany::make('ResourceLevel', 'levels'),
            BelongsToMany::make('ResourceType', 'types'),
            BelongsToMany::make('ResourceSubject', 'subjects'),
            BelongsToMany::make('ResourceCategory', 'categories'),
            BelongsToMany::make('ResourceProgrammingLanguage', 'programmingLanguages'),
            BelongsToMany::make('ResourceLanguage', 'languages'),
            Text::make('name')->sortable(),
            Text::make('Description')->sortable()->hideFromIndex(),
            Text::make('Source')->sortable()->hideFromIndex(),
            Number::make('weight')->sortable(),
            Boolean::make('Teach'),
            Boolean::make('Learn'),

            //Text::make('Thumbnail')->hideFromIndex(),
            AdvancedImage::make('Thumbnail')->croppable(374 / 200)->resize(374, 200)->disk('resources')->hideFromIndex(),

            Text::make('Facebook')->hideFromIndex(),
            Text::make('Twitter')->hideFromIndex(),
            Boolean::make('Active'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [new Filters\ResourceActive];

    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
