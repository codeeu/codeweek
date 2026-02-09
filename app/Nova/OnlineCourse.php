<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class OnlineCourse extends Resource
{
    public static $group = 'Resources';

    public static $model = \App\OnlineCourse::class;

    public static $title = 'title';

    public static $search = ['title', 'description'];

    public static function label()
    {
        return 'Online Courses';
    }

    public static function singularLabel()
    {
        return 'Online Course';
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Title', 'title')->rules('required'),
            Text::make('URL', 'url')->rules('required', 'url'),
            Text::make('Date (display)', 'date_display')
                ->help('e.g. "9 October – 15 November 2023"')
                ->nullable(),
            Text::make('Image', 'image')
                ->help('Filename in /public/img/online-courses/ (e.g. navigating-innovative-technologies-across-the-curriculum.png)')
                ->nullable(),
            Textarea::make('Description', 'description')->nullable()->alwaysShow(),
            Number::make('Position', 'position')->min(0)->help('Lower = higher on page.')->nullable(),
            Boolean::make('Active', 'active'),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->ordered();
    }
}
