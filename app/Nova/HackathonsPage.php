<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class HackathonsPage extends Resource
{
    public static $group = 'Content';

    public static $model = \App\HackathonsPage::class;

    public static $title = 'id';

    public static function label()
    {
        return 'Hackathons Page';
    }

    public static function singularLabel()
    {
        return 'Hackathons Page';
    }

    public static function uriKey(): string
    {
        return 'hackathons-page';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('id', 1);
    }

    public function fields(Request $request): array
    {
        $fields = [
            ID::make()->onlyOnForms(),
            Boolean::make('Use dynamic content', 'dynamic_content')
                ->help('Keep OFF to use current static template content. Turn ON to use the values below.'),

            Panel::make('Hero', [
                Text::make('Hero title', 'hero_title')->nullable(),
                Trix::make('Hero subtitle', 'hero_subtitle')->nullable(),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Intro section', [
                Text::make('Intro title', 'intro_title')->nullable(),
                Trix::make('Intro paragraph 1', 'intro_paragraph_1')->nullable(),
                Trix::make('Intro paragraph 2', 'intro_paragraph_2')->nullable(),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Details section', [
                Text::make('Details title', 'details_title')->nullable(),
                Trix::make('Details paragraph 1', 'details_paragraph_1')->nullable(),
                Trix::make('Details paragraph 2', 'details_paragraph_2')->nullable(),
                Trix::make('Details paragraph 3', 'details_paragraph_3')->nullable(),
                Trix::make('Details paragraph 4', 'details_paragraph_4')->nullable(),
                Text::make('Video URL (embed)', 'video_url')->nullable(),
                Text::make('Extra button text (optional)', 'extra_button_text')->nullable(),
                Text::make('Extra button link (optional)', 'extra_button_link')->nullable(),
                Text::make('Recap button text', 'recap_button_text')->nullable(),
                Text::make('Recap button link', 'recap_button_link')->nullable(),
                Text::make('Toolkit button text', 'toolkit_button_text')->nullable(),
                Text::make('Toolkit button link', 'toolkit_button_link')->nullable(),
            ])->collapsable()->collapsedByDefault(),
            Panel::make('Translations (JSON)', [
                Code::make('Locale overrides', 'locale_overrides')
                    ->json()
                    ->help('Optional per-locale overrides. Example: {"fr":{"hero_title":"Hackathons"}}'),
            ])->collapsable()->collapsedByDefault(),
        ];

        return $fields;
    }
}
