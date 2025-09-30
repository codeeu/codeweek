<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class Theme extends Resource
{
    public static $model = \App\Theme::class;
    public static $title = 'name';
    public static $search = ['id', 'name'];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->sortable()->rules('required', 'max:255'),
            Text::make('Order')->sortable()->rules('nullable', 'integer'),
        ];
    }
}
