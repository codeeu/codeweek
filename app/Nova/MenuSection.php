<?php

namespace App\Nova;

use App\Models\MenuSection as MenuSectionModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class MenuSection extends Resource
{
    use HasSortableRows;

    public static $group = 'Site';

    public static $model = MenuSectionModel::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'location',
        'column',
        'title',
        'title_key',
    ];

    public static function label()
    {
        return 'Menu Sections';
    }

    public static function singularLabel()
    {
        return 'Menu Section';
    }

    public function title(): string
    {
        $location = (string) ($this->location ?? '');
        $column = (string) ($this->column ?? '');
        $title = $this->title_key ? __((string) $this->title_key) : (string) ($this->title ?? '');
        $title = trim($title) !== '' ? $title : "Section #{$this->id}";

        return trim("{$location} · {$column} · {$title}");
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Location', 'location')
                ->rules('required', 'max:255')
                ->help('Example: resources_dropdown'),

            Select::make('Column', 'column')
                ->options([
                    'left' => 'Left',
                    'right' => 'Right',
                ])
                ->displayUsingLabels()
                ->rules('required'),

            Text::make('Title Key', 'title_key')
                ->nullable()
                ->rules('nullable', 'max:255')
                ->help('Preferred. Example: menu.learn_to_code'),

            Text::make('Title (literal)', 'title')
                ->nullable()
                ->rules('nullable', 'max:255')
                ->help('Used only if Title Key is empty.'),

            Boolean::make('Active', 'is_active')->default(true),

            HasMany::make('Items', 'items', MenuItem::class),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }
}

