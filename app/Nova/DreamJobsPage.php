<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class DreamJobsPage extends Resource
{
    public static $group = 'Content';

    public static $model = \App\DreamJobsPage::class;

    public static $title = 'id';

    public static function label()
    {
        return 'Dream Jobs in Digital';
    }

    public static function singularLabel()
    {
        return 'Dream Jobs Page';
    }

    public static function uriKey(): string
    {
        return 'dream-jobs-page';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('id', 1);
    }

    public function fields(Request $request): array
    {
        $resourcesPanelFields = [
            Boolean::make('Use dynamic content for this section', 'resources_dynamic'),
            Text::make('Resources section title', 'resources_title')->nullable(),
            HasMany::make('Resources', 'resources', DreamJobsResource::class),
        ];

        $fields = [
            ID::make()->onlyOnForms(),

            Panel::make('Hero', [
                Boolean::make('Use dynamic content for this section', 'hero_dynamic'),
                Textarea::make('Hero intro', 'hero_intro')->nullable(),
                Text::make('Hero button text', 'hero_cta_text')->nullable(),
                Text::make('Hero button link', 'hero_cta_link')->nullable()->help('Defaults to #dream-job-resources'),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('About', [
                Boolean::make('Use dynamic content for this section', 'about_dynamic'),
                Text::make('About title', 'about_title')->nullable(),
                Textarea::make('About description', 'about_description')->nullable(),
                Text::make('About video URL', 'about_video_url')
                    ->nullable()
                    ->help('YouTube embed URL used in the About section video player.'),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Role models section', [
                Boolean::make('Use dynamic content for this section', 'role_models_dynamic'),
                Text::make('Role models section title', 'role_models_title')->nullable(),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Resources section (global for all role model pages)', $resourcesPanelFields)
                ->collapsable()
                ->collapsedByDefault(),
            Panel::make('Translations (JSON)', [
                Code::make('Locale overrides', 'locale_overrides')
                    ->json()
                    ->help('Optional per-locale overrides. Example: {"fr":{"hero_intro":"..."}}'),
            ])->collapsable()->collapsedByDefault(),
        ];

        return $fields;
    }
}
