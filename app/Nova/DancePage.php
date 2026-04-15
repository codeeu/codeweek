<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class DancePage extends Resource
{
    public static $group = 'Content';
    public static $model = \App\DancePage::class;
    public static $title = 'id';

    public static function label()
    {
        return 'Dance Page';
    }

    public static function singularLabel()
    {
        return 'Dance Page';
    }

    public static function uriKey(): string
    {
        return 'dance-page';
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        if (!\Illuminate\Support\Facades\Schema::hasTable('dance_page')) {
            return $query->whereRaw('1 = 0');
        }

        $page = \App\DancePage::config();

        return $query->where('id', $page->id);
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
                Text::make('Hero title', 'hero_title')->nullable(),
                Trix::make('Hero subtitle', 'hero_subtitle')->nullable(),
            ])->collapsable()->collapsedByDefault(),
            Panel::make('Content intro', [
                Text::make('Title', 'content_intro_title')->nullable(),
                Trix::make('Subtitle', 'content_intro_subtitle')->nullable(),
            ])->collapsable()->collapsedByDefault(),
            Panel::make('Get involved section', [
                Text::make('Title', 'get_involved_title')->nullable(),
                Trix::make('Subtitle', 'get_involved_subtitle')->nullable(),
            ])->collapsable()->collapsedByDefault(),
        ];
    }
}
