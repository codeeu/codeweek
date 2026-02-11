<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class GirlsInDigitalButton extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GirlsInDigitalButton::class;

    public static $title = 'label';

    public static $search = ['key', 'label'];

    public static function label()
    {
        return 'Girls in Digital – Buttons';
    }

    public static function singularLabel()
    {
        return 'Girls in Digital Button';
    }

    public static function authorizedToViewAny(Request $request): bool
    {
        return true;
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Key', 'key')
                ->rules('required')
                ->help('Unique identifier, e.g. gcib_sprint_hero. Used in the blade to place the button.'),
            Text::make('Label', 'label')->rules('required'),
            Text::make('URL', 'url')->rules('required')->hideFromIndex(),
            Boolean::make('Open in new tab', 'open_new_tab'),
            Boolean::make('Enabled', 'enabled')
                ->help('When disabled, this button is hidden on the Girls in Digital page.'),
            Number::make('Position', 'position')->min(0)->default(0),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position')->orderBy('id');
    }
}
