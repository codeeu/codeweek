<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class CsrCampaignResource extends Resource
{
    public static $model = \App\CsrCampaignResource::class;
    public static $title = 'title';
    public static $displayInNavigation = false;

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Title', 'title')->nullable(),
            Textarea::make('Description', 'description')->nullable()->alwaysShow(),
            Text::make('Button text', 'button_text')->nullable(),
            Text::make('Button link', 'button_link')->nullable(),
            Text::make('Desktop image', 'image')->nullable(),
            Text::make('Mobile image', 'image_mobile')->nullable(),
            Number::make('Position', 'position')->min(0)->nullable(),
            Boolean::make('Active', 'active'),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position')->orderBy('id');
    }
}
