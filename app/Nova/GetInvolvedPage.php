<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class GetInvolvedPage extends Resource
{
    public static $group = 'Content';

    public static $model = \App\StaticPage::class;

    public static $title = 'name';

    public static $priority = 10;

    public static function label()
    {
        return 'Get Involved';
    }

    public static function singularLabel()
    {
        return 'Get Involved Page';
    }

    public static function uriKey(): string
    {
        return 'get-involved-page';
    }

    public static function authorizedToViewAny(Request $request): bool
    {
        return true;
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('path', '/get-involved');
    }

    public static function relatableQuery(NovaRequest $request, $query)
    {
        return $query->where('path', '/get-involved');
    }

    public static function authorizedToCreate(Request $request): bool
    {
        return false;
    }

    public function fields(Request $request): array
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
                    'Other' => 'Other',
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
                ->readonly()
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
}
