<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class GrassrootsGrantsProjectImage extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GrassrootsGrantsProjectImage::class;

    public static $title = 'url';

    public static $search = ['url', 'alt'];

    public static $displayInNavigation = false;

    public static function label(): string
    {
        return 'Grassroots Grants Project Images';
    }

    public static function singularLabel(): string
    {
        return 'Project Image';
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
            Text::make('URL', 'url')
                ->rules('required', 'string')
                ->help('Local path (e.g. /images/grants/Greece/...) or full S3/HTTPS URL.'),
            Text::make('Alt text', 'alt')->nullable(),
            Select::make('File type', 'file_type')->options([
                'image' => 'Image',
                'pdf' => 'PDF',
            ])->displayUsingLabels(),
            Number::make('Order', 'position')->min(0),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position');
    }
}
