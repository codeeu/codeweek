<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class HomeSlide extends Resource
{
    public static $group = 'Content';

    public static $model = \App\HomeSlide::class;

    public static $title = 'title';

    public static $search = [];

    public static function label()
    {
        return 'Homepage Slides';
    }

    public static function singularLabel()
    {
        return 'Homepage Slide';
    }

    public static function authorizedToViewAny(Request $request): bool
    {
        return true;
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            KeyValue::make('Title', 'title_translations')
                ->keyLabel('Locale (e.g. en, fr, de)')
                ->valueLabel('Text')
                ->rules('required')
                ->help('Add one row per language. Key = locale code (en, fr, de, …), Value = translated title.'),
            KeyValue::make('Description', 'description_translations')
                ->keyLabel('Locale')
                ->valueLabel('Text')
                ->help('Add one row per language.'),
            Text::make('Primary button URL', 'url')->rules('required')->hideFromIndex(),
            KeyValue::make('Primary button label', 'button_text_translations')
                ->keyLabel('Locale')
                ->valueLabel('Text')
                ->rules('required')
                ->help('Add one row per language.'),
            Boolean::make('Open primary link in new tab', 'open_primary_new_tab')
                ->help('Open the primary button link in a new window/tab.'),
            Text::make('Second button URL', 'url2')->nullable()->hideFromIndex(),
            KeyValue::make('Second button label', 'button2_text_translations')
                ->keyLabel('Locale')
                ->valueLabel('Text')
                ->help('Add one row per language. Leave empty to hide second button.'),
            Boolean::make('Open second link in new tab', 'open_second_new_tab')
                ->help('Open the second button link in a new window/tab.'),
            Text::make('Image', 'image')
                ->nullable()
                ->help('Path from site root e.g. images/dream-jobs/dream_jobs_bg.png (no leading slash), or full URL. Used as slide background.'),
            Number::make('Position', 'position')
                ->min(0)
                ->default(0)
                ->help('Lower = first. Order of slides on homepage.'),
            Boolean::make('Active', 'active'),
            Boolean::make('Show countdown', 'show_countdown')
                ->help('Show countdown timer on this slide (usually first slide).'),
            DateTime::make('Countdown target', 'countdown_target')
                ->nullable()
                ->help('Target date/time for countdown (e.g. Code Week start). Only used if Show countdown is on.'),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position')->orderBy('id');
    }
}
