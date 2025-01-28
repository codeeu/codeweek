<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class StaticPage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\StaticPage>
     */
    public static $model = \App\StaticPage::class;

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
        'id', 'name', 'description', 'path'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Boolean::make('Is Searchable', 'is_searchable'),

            Select::make('Category')
                ->options([
                    'General' => 'General',
                    'Challenges' => 'Challenges',
                    'Tranning' => 'Tranning',
                    'Online Courses' => 'Online Courses',
                    'Other' => 'Other'
                ])
                ->nullable()
                ->displayUsingLabels(),

            Select::make('Link Type', 'link_type')
                ->options([
                    'internal_link' => 'Internal Link',
                    'external_link' => 'External Link',
                ])
                ->rules('required')
                ->displayUsingLabels(),

            Textarea::make('Description')->nullable(),

            Text::make('Language')
                ->sortable()
                ->rules('required', 'size:2')
                ->default('en'),

            Text::make('Unique Identifier')
                ->rules('required', 'unique:static_pages,unique_identifier,{{resourceId}}'),

            Text::make('Path')
                ->rules('required', 'unique:static_pages,path,{{resourceId}}'),

            Text::make('Keywords')
                ->rules('nullable')
                ->help('Enter keywords separated by commas, e.g., coding, education, technology.'),

            Text::make('Thumbnail')->nullable(),

            Text::make('Meta Title')->nullable(),

            Textarea::make('Meta Description')->nullable(),

            Textarea::make('Meta Keywords')->nullable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
