<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class Audience extends Resource
{
    public static $model = \App\Audience::class;
    public static $title = 'name';
    public static $search = ['id', 'name'];

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->sortable()->rules('required', 'max:255'),
        ];
    }
}
