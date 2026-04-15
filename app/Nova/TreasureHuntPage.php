<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class TreasureHuntPage extends Resource
{
    public static $group = 'Content';
    public static $model = \App\TreasureHuntPage::class;
    public static $title = 'id';

    public static function label()
    {
        return 'Treasure Hunt Page';
    }

    public static function singularLabel()
    {
        return 'Treasure Hunt Page';
    }

    public static function uriKey(): string
    {
        return 'treasure-hunt-page';
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
                Text::make('Title', 'hero_title')->nullable(),
                Trix::make('Subtitle', 'hero_subtitle')->nullable(),
            ])->collapsable()->collapsedByDefault(),
            Panel::make('Intro section', [
                Text::make('Title', 'intro_title')->nullable(),
                Trix::make('Paragraph 1', 'intro_paragraph_1')->nullable(),
                Trix::make('Paragraph 2', 'intro_paragraph_2')->nullable(),
            ])->collapsable()->collapsedByDefault(),
            Panel::make('How to play section', [
                Text::make('Title', 'how_to_play_title')->nullable(),
                Trix::make('Step 1 text', 'step_1_text')->nullable(),
                Trix::make('Step 2 text', 'step_2_text')->nullable(),
                Trix::make('Step 3 text', 'step_3_text')->nullable(),
                Trix::make('Step 4 text', 'step_4_text')->nullable(),
                Trix::make('Info box text', 'info_text')->nullable(),
            ])->collapsable()->collapsedByDefault(),
            Panel::make('Get involved section', [
                Text::make('Title', 'get_involved_title')->nullable(),
                Trix::make('Description', 'get_involved_text')->nullable(),
                Text::make('Link 1 URL', 'get_involved_link_1')->nullable(),
                Text::make('Link 2 URL', 'get_involved_link_2')->nullable(),
                Text::make('Link 3 URL', 'get_involved_link_3')->nullable(),
                Text::make('Link 4 URL', 'get_involved_link_4')->nullable(),
                Text::make('Link 5 URL', 'get_involved_link_5')->nullable(),
            ])->collapsable()->collapsedByDefault(),
        ];
    }
}
