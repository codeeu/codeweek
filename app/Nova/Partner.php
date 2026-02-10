<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Partner extends Resource
{
    public static $group = 'Content';

    public static $model = \App\Partner::class;

    public static $title = 'name';

    public static $search = ['name', 'description'];

    public static function label()
    {
        return 'Partners & Sponsors';
    }

    public static function singularLabel()
    {
        return 'Partner / Sponsor';
    }

    public static function authorizedToViewAny(Request $request): bool
    {
        return true;
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name', 'name')
                ->nullable()
                ->help('Display name. Optional for sponsor logos (e.g. EU Code Week Supporters).'),

            Text::make('Logo URL', 'logo_url')
                ->rules('required')
                ->help('Path from site root, e.g. images/partners/logo.png (no leading slash), or full URL.'),

            Select::make('Category', 'categories')
                ->options([
                    'Partners' => 'Partners',
                    'Sponsor' => 'EU Code Week Supporters (Sponsor)',
                ])
                ->help('Partners = "Partners" tab; Sponsor = "EU Code Week Supporters" tab.')
                ->resolveUsing(function ($value) {
                    $arr = is_array($value) ? $value : (array) json_decode($value ?? '[]', true);
                    return $arr[0] ?? null;
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    $v = $request->get($requestAttribute);
                    $model->{$attribute} = $v !== null && $v !== '' ? [$v] : [];
                }),

            Textarea::make('Description', 'description')
                ->nullable()
                ->help('HTML allowed. Shown when partner is selected (Partners tab only).'),

            Text::make('Link URL', 'link_url')
                ->nullable()
                ->help('Website URL for "Visit Partner" link.'),

            Text::make('Main image URL', 'main_img_url')
                ->nullable()
                ->help('Larger image path (optional).'),

            Number::make('Position', 'position')
                ->min(0)
                ->default(0)
                ->help('Order on partners page (lower = first).'),

            Boolean::make('Active', 'active')
                ->help('Inactive partners are hidden from the sponsors page.'),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position')->orderBy('id');
    }
}
