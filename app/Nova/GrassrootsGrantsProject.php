<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class GrassrootsGrantsProject extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GrassrootsGrantsProject::class;

    public static $title = 'title';

    public static $search = ['title', 'organisation', 'location'];

    public static $displayInNavigation = false;

    public static function label(): string
    {
        return 'Grassroots Grants Projects';
    }

    public static function singularLabel(): string
    {
        return 'Funded Project';
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->onlyOnForms(),
            Hidden::make('Hub', 'hub_id')
                ->default(function ($request) {
                    if ($request instanceof NovaRequest && method_exists($request, 'viaResourceId')) {
                        return $request->viaResourceId();
                    }

                    return $request->query('viaResourceId');
                }),
            Text::make('Title', 'title')->rules('required', 'string'),
            Text::make('Organisation', 'organisation')->nullable(),
            Text::make('Location', 'location')->nullable(),
            Text::make('Participants', 'participants')->nullable(),
            Text::make('Educators', 'educators')->nullable(),
            Text::make('Activities', 'activities')->nullable(),
            Trix::make('Description', 'description')->nullable(),
            Text::make('Underserved focus', 'underserved_focus')->nullable(),
            Text::make('Image folder', 'image_folder')
                ->nullable()
                ->help('Relative to public/images/grants/ for reference when re-seeding images.'),
            Boolean::make('Active', 'active')->default(true),
            Number::make('Order', 'position')->min(0),
            HasMany::make('Links', 'links', GrassrootsGrantsProjectLink::class),
            HasMany::make('Images', 'images', GrassrootsGrantsProjectImage::class),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position');
    }
}
