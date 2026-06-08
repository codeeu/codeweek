<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class GrassrootsGrantsPage extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GrassrootsGrantsPage::class;

    public static $title = 'hero_title';

    public static $priority = 5;

    public static function label(): string
    {
        return 'Grassroots Grants';
    }

    public static function singularLabel(): string
    {
        return 'Grassroots Grants Page';
    }

    public static function uriKey(): string
    {
        return 'grassroots-grants-page';
    }

    public static function authorizedToCreate(Request $request): bool
    {
        return false;
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('id', 1);
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->onlyOnForms(),

            Panel::make('Publishing', [
                Boolean::make('Preview mode', 'is_preview_mode')
                    ->help('When enabled, /grassroots-grants returns 404 and only the signed preview URL below works. The footer link stays hidden until preview mode is off.'),
                Text::make('Preview URL', function () {
                    if (! $this->resource?->exists) {
                        return 'Save first to generate preview URL.';
                    }

                    $url = $this->resource->previewSignedUrl();

                    return '<a href="'.$url.'" target="_blank" rel="noopener noreferrer">'.$url.'</a>';
                })
                    ->onlyOnDetail()
                    ->asHtml()
                    ->help('Share this signed link for review. It expires in 14 days. Regenerate by reopening this page in Nova.'),
            ])->collapsable(),

            Panel::make('Hero', [
                Text::make('Title', 'hero_title')->nullable(),
                Text::make('Subtitle', 'hero_subtitle')->nullable(),
                Text::make('Hero image', 'hero_image')
                    ->nullable()
                    ->help('Local path (e.g. /images/grants/hero.jpg) or full S3/HTTPS URL.'),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('SEO', [
                Text::make('Meta title', 'meta_title')->nullable(),
                Text::make('Meta description', 'meta_description')->nullable(),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Round 1 overview', [
                Text::make('Round title', 'round_title')->nullable(),
                Trix::make('Overview intro', 'overview_intro')->nullable(),
                Trix::make('Common activity types', 'overview_activity_types')->nullable(),
                Trix::make('Underserved focus summary', 'overview_underserved')->nullable(),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Country hubs', [
                HasMany::make('Hubs', 'hubs', GrassrootsGrantsHub::class),
            ])->collapsable()->collapsedByDefault(),
        ];
    }
}
