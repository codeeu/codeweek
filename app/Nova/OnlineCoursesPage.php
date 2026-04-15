<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class OnlineCoursesPage extends Resource
{
    public static $group = 'Content';
    public static $model = \App\OnlineCoursesPage::class;
    public static $title = 'id';

    public static function label()
    {
        return 'Online Courses Page';
    }

    public static function singularLabel()
    {
        return 'Online Courses Page';
    }

    public static function uriKey(): string
    {
        return 'online-courses-page';
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
                Trix::make('Text', 'hero_text')->nullable(),
                Text::make('CTA text', 'hero_cta_text')->nullable(),
                Text::make('CTA link', 'hero_cta_link')->nullable(),
            ])->collapsable()->collapsedByDefault(),
            Panel::make('Intro section', [
                Text::make('Title', 'intro_title')->nullable(),
                Trix::make('Paragraph 1', 'intro_text_1')->nullable(),
                Trix::make('Paragraph 2', 'intro_text_2')->nullable(),
                Trix::make('Paragraph 3', 'intro_text_3')->nullable(),
            ])->collapsable()->collapsedByDefault(),
        ];
    }
}
