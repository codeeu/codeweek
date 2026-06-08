<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class GrassrootsGrantsHub extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GrassrootsGrantsHub::class;

    public static $title = 'title';

    public static $search = ['title', 'overview'];

    public static $displayInNavigation = false;

    public static function label(): string
    {
        return 'Grassroots Grants Hubs';
    }

    public static function singularLabel(): string
    {
        return 'Country Hub';
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->onlyOnForms(),
            Hidden::make('Page', 'page_id')
                ->default(function ($request) {
                    if ($request instanceof NovaRequest && method_exists($request, 'viaResourceId')) {
                        return $request->viaResourceId() ?? 1;
                    }

                    return $request->query('viaResourceId', 1);
                }),
            Text::make('Title', 'title')->rules('required', 'string'),
            Select::make('Status', 'hub_status')->options([
                'active' => 'Active (funded projects)',
                'not_launched' => 'Call not launched',
                'cancelled' => 'Cancelled',
            ])->displayUsingLabels(),
            Number::make('Projects funded', 'projects_funded')->nullable()->min(0),
            Number::make('Participants reached', 'participants_reached')->nullable()->min(0),
            Number::make('Educators engaged', 'educators_engaged')->nullable()->min(0),
            Number::make('Activities on platform', 'activities_on_platform')->nullable()->min(0),
            Trix::make('Overview', 'overview')->nullable(),
            Text::make('Underserved focus', 'underserved_focus')->nullable(),
            Trix::make('Status message', 'status_message')
                ->nullable()
                ->help('Shown for hubs where the call was not launched or was cancelled.'),
            Text::make('Image folder', 'image_folder')
                ->nullable()
                ->help('Relative to public/images/grants/ for reference.'),
            Boolean::make('Active', 'active')->default(true),
            Number::make('Order', 'position')->min(0),
            HasMany::make('Funded projects', 'projects', GrassrootsGrantsProject::class),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position');
    }
}
