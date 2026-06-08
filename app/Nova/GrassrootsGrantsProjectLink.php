<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class GrassrootsGrantsProjectLink extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GrassrootsGrantsProjectLink::class;

    public static $title = 'url';

    public static $search = ['label', 'url'];

    public static $displayInNavigation = false;

    public static function label(): string
    {
        return 'Grassroots Grants Project Links';
    }

    public static function singularLabel(): string
    {
        return 'Project Link';
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->onlyOnForms(),
            Hidden::make('Project', 'project_id')
                ->default(function ($request) {
                    if ($request instanceof NovaRequest && method_exists($request, 'viaResourceId')) {
                        return $request->viaResourceId();
                    }

                    return $request->query('viaResourceId');
                }),
            Text::make('Label', 'label')->nullable(),
            Text::make('URL', 'url')->rules('required', 'string'),
            Number::make('Order', 'position')->min(0),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position');
    }
}
