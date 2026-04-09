<?php

namespace App\Nova;

use App\Models\MenuItem as MenuItemModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class MenuItem extends Resource
{
    use HasSortableRows;

    public static $model = MenuItemModel::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'label',
        'label_key',
        'url',
        'route_name',
    ];

    public static $displayInNavigation = false;

    public function title(): string
    {
        $label = $this->resource?->resolvedLabel() ?: "Item #{$this->id}";
        $href = $this->resource?->resolvedHref();
        $hrefPart = $href ? " · {$href}" : '';

        return $label.$hrefPart;
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Section', 'section', MenuSection::class)
                ->sortable()
                ->rules('required'),

            Text::make('Label Key', 'label_key')
                ->nullable()
                ->rules('nullable', 'max:255')
                ->help('Preferred. Example: menu.webinars'),

            Text::make('Label (literal)', 'label')
                ->nullable()
                ->rules('nullable', 'max:255')
                ->help('Used only if Label Key is empty (and no locale override exists).'),

            KeyValue::make('Label Overrides', 'label_overrides')
                ->keyLabel('Locale')
                ->valueLabel('Label')
                ->nullable()
                ->rules('nullable')
                ->help('Optional per-locale labels. Example key: en, fr, de'),

            Text::make('Route Name', 'route_name')
                ->nullable()
                ->rules('nullable', 'max:255')
                ->help('Preferred for internal links, e.g. educational-resources'),

            Code::make('Route Params', 'route_params')
                ->json()
                ->nullable()
                ->rules('nullable')
                ->help('Optional JSON object, e.g. {"slug":"xyz"}'),

            Text::make('URL', 'url')
                ->nullable()
                ->rules('nullable', 'max:2048')
                ->help('Use for external links or hardcoded internal paths like /podcasts'),

            Boolean::make('Open in new tab', 'open_in_new_tab')->default(false),
            Boolean::make('Active', 'is_active')->default(true),

            Text::make('Preview', function () {
                $label = $this->resource?->resolvedLabel() ?: '';
                $href = $this->resource?->resolvedHref() ?: '';
                return trim($label.' '.$href);
            })->onlyOnDetail(),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}

