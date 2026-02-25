<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class DreamJobRoleModel extends Resource
{
    public static $group = 'Content';

    public static $model = \App\DreamJobRoleModel::class;

    public static $title = 'slug';

    public static $search = [
        'first_name',
        'last_name',
        'slug',
        'role',
    ];

    public static function label()
    {
        return 'Dream Jobs Role Models';
    }

    public static function singularLabel()
    {
        return 'Dream Jobs Role Model';
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('First Name', 'first_name')->rules('required', 'max:255'),
            Text::make('Last Name', 'last_name')->rules('required', 'max:255'),
            Text::make('Slug', 'slug')
                ->rules('required', 'max:255', 'unique:dream_job_role_models,slug,{{resourceId}}')
                ->help('Used in URL, e.g. anny-tubbs'),
            Trix::make('Role', 'role')->rules('required'),

            Text::make('Image URL', 'image')
                ->rules('required', 'max:2048')
                ->help('Path from site root, e.g. /images/dream-jobs/anny-tubbs.png'),
            Text::make('Country Code', 'country')
                ->rules('required', 'max:8')
                ->help('Flag code used by existing assets, e.g. be, fr, gr'),

            Trix::make('Description 1', 'description1')->nullable()
                ->help('Supports rich text formatting, links, and lists.'),
            Trix::make('Description 2', 'description2')->nullable()
                ->help('Supports rich text formatting, links, and lists.'),

            Text::make('Profile Link', 'link')->nullable()->rules('nullable', 'max:2048'),
            Text::make('Video Embed URL', 'video')->nullable()->rules('nullable', 'max:2048'),
            Text::make('Pathway Map Filename', 'pathway_map_link')
                ->nullable()
                ->rules('nullable', 'max:255')
                ->help('Either a full URL (e.g. S3 link) OR a filename in /public/docs/dream-jobs/, e.g. Career Pathway Map Anny Tubbs.pdf'),

            Number::make('Position', 'position')
                ->min(0)
                ->default(0)
                ->help('Lower numbers appear first.'),

            Boolean::make('Active', 'active')->default(true),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position')->orderBy('first_name');
    }
}
