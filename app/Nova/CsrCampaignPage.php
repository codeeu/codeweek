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

class CsrCampaignPage extends Resource
{
    public static $group = 'Content';
    public static $model = \App\CsrCampaignPage::class;
    public static $title = 'id';

    public static function label()
    {
        return 'Future Ready CSR';
    }

    public static function singularLabel()
    {
        return 'Future Ready CSR Page';
    }

    public static function uriKey(): string
    {
        return 'csr-campaign-page';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('id', 1);
    }

    public static function authorizedToCreate(Request $request): bool
    {
        return false;
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->onlyOnForms(),
            Panel::make('General', [
                Boolean::make('Use dynamic content for this page', 'use_dynamic_content'),
            ])->collapsable()->collapsedByDefault(),
            Panel::make('Hero', [
                Trix::make('Hero text', 'hero_text')->nullable(),
                Text::make('Primary CTA text', 'primary_cta_text')->nullable(),
                Text::make('Primary CTA link', 'primary_cta_link')->nullable(),
                Text::make('Secondary CTA text', 'secondary_cta_text')->nullable(),
                Text::make('Secondary CTA link', 'secondary_cta_link')->nullable(),
            ])->collapsable()->collapsedByDefault(),
            Panel::make('About section', [
                Text::make('Title', 'about_title')->nullable(),
                Trix::make('Description', 'about_description')->nullable(),
            ])->collapsable()->collapsedByDefault(),
            Panel::make('Resources section', [
                Text::make('Section title', 'resources_title')->nullable(),
                HasMany::make('Resources', 'resources', CsrCampaignResource::class),
            ])->collapsable()->collapsedByDefault(),
        ];
    }
}
