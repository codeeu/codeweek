<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Podcast extends Resource {
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request) {
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
            DateTime::make('Release Date')->sortable()->format('DD/MM/Y'),
            Text::make('Guest Title','guest_title')
                ->sortable()
                ->hideFromIndex(),
            Markdown::make('Guest Description','guest_description')->hideFromIndex(),
            Markdown::make('Resources', 'resources')->hideFromIndex(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request) {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request) {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request) {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request) {
        return [];
    }
}
