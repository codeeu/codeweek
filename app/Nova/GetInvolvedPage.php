<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class GetInvolvedPage extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GetInvolvedPage::class;

    public static $title = 'id';

    public static $priority = 10;

    public static function label()
    {
        return 'Get Involved';
    }

    public static function singularLabel()
    {
        return 'Get Involved Page';
    }

    public static function uriKey(): string
    {
        return 'get-involved-page';
    }

    public static function authorizedToViewAny(Request $request): bool
    {
        return true;
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('id', 1);
    }

    public static function relatableQuery(NovaRequest $request, $query)
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
                Text::make('Heading', 'intro_heading')->nullable(),
                Trix::make('Intro text', 'intro_text')->nullable(),
                Text::make('Button text', 'intro_button_text')->nullable(),
                Text::make('Button link', 'intro_button_link')->nullable(),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Movement section', [
                Text::make('Heading', 'movement_heading')->nullable(),
                Trix::make('Paragraph 1', 'movement_text_1')->nullable(),
                Trix::make('Paragraph 2', 'movement_text_2')->nullable(),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('How to start section', [
                Text::make('Heading', 'start_heading')->nullable(),
                Trix::make('Text', 'start_text')->nullable(),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Card: Community', [
                Text::make('Title', 'card_community_title')->nullable(),
                Trix::make('Text', 'card_community_text')->nullable(),
                Text::make('Link URL (optional)', 'card_community_link')->nullable(),
                Boolean::make('Open in new tab', 'card_community_new_tab'),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Card: Activity', [
                Text::make('Title', 'card_activity_title')->nullable(),
                Trix::make('Text', 'card_activity_text')->nullable(),
                Text::make('Link URL (optional)', 'card_activity_link')->nullable(),
                Boolean::make('Open in new tab', 'card_activity_new_tab'),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Card: Ambassadors', [
                Text::make('Title', 'card_ambassadors_title')->nullable(),
                Trix::make('Text', 'card_ambassadors_text')->nullable(),
                Text::make('Link URL (optional)', 'card_ambassadors_link')->nullable(),
                Boolean::make('Open in new tab', 'card_ambassadors_new_tab'),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Card: Stories', [
                Text::make('Title', 'card_stories_title')->nullable(),
                Trix::make('Text', 'card_stories_text')->nullable(),
                Text::make('Link URL (optional)', 'card_stories_link')->nullable(),
                Boolean::make('Open in new tab', 'card_stories_new_tab'),
            ])->collapsable()->collapsedByDefault(),
        ];
    }
}
