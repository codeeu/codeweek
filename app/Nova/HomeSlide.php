<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class HomeSlide extends Resource
{
    public static $group = 'Content';

    public static $model = \App\HomeSlide::class;

    public static $title = 'title';

    public static $search = ['title', 'description'];

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
            Text::make('Title', 'title')
                ->rules('required')
                ->help('Lang key (e.g. home.banner1_title) or plain text.'),
            Textarea::make('Description', 'description')
                ->nullable()
                ->help('Lang key or plain text.'),
            Text::make('Primary button URL', 'url')->rules('required')->hideFromIndex(),
            Text::make('Primary button label', 'button_text')
                ->rules('required')
                ->help('Lang key (e.g. home.learn_more) or plain text.'),
            Text::make('Second button URL', 'url2')->nullable()->hideFromIndex(),
            Text::make('Second button label', 'button2_text')
                ->nullable()
                ->help('Leave empty to hide second button.'),
            Text::make('Image', 'image')
                ->nullable()
                ->help('Path e.g. /images/homepage/slide1.png or full URL. Used as slide background.'),
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
