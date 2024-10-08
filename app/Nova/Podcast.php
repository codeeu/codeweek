<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Podcast extends Resource
{
    public static $group = 'Podcasts';
    public static $displayInNavigation = true;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Podcast::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = ['id'];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(Request $request): array
    {
        return [
            Boolean::make('Active')->sortable(),
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('Title')->sortable(),
            Textarea::make('Description')->hideFromIndex(),
            Number::make('Duration')->hideFromIndex(),
            Number::make('File Size', 'filesize')->hideFromIndex(),
            Text::make('Filename')
                ->sortable()
                ->hideFromIndex(),
            Text::make('Image')
                ->sortable()
                ->hideFromIndex(),
            Text::make('Transcript')
                ->sortable()
                ->hideFromIndex(),
            DateTime::make('Release Date')->sortable(),
            HasMany::make('PodcastGuests', 'guests'),
            HasMany::make('PodcastResources', 'resources'),

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
