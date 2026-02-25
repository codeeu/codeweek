<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class DreamJobsResource extends Resource
{
    public static $group = 'Content';

    public static $model = \App\DreamJobsResource::class;

    public static $title = 'title';

    public static $search = ['title', 'description', 'button_text', 'button_link'];

    public static $displayInNavigation = false;

    private static function localesSorted(): array
    {
        $locales = config('app.locales', ['en']);
        if (is_string($locales)) {
            $locales = array_map('trim', explode(',', $locales));
        }
        $locales = array_values(array_filter($locales));
        if (empty($locales)) {
            $locales = ['en'];
        }
        sort($locales);

        return $locales;
    }

    public function fields(Request $request): array
    {
        $translationFields = [];
        foreach (self::localesSorted() as $locale) {
            if ($locale === 'en') {
                continue;
            }

            $translationFields[] = Text::make('Title (' . strtoupper($locale) . ')', 'locale_' . $locale . '_title')
                ->nullable()
                ->resolveUsing(function () use ($locale) {
                    $overrides = $this->resource->locale_overrides ?? [];

                    return $overrides[$locale]['title'] ?? '';
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) use ($locale) {
                    $overrides = $model->locale_overrides ?? [];
                    $overrides[$locale]['title'] = $request->get($requestAttribute) ?: null;
                    $model->locale_overrides = $overrides;
                });

            $translationFields[] = Textarea::make('Description (' . strtoupper($locale) . ')', 'locale_' . $locale . '_description')
                ->nullable()
                ->resolveUsing(function () use ($locale) {
                    $overrides = $this->resource->locale_overrides ?? [];

                    return $overrides[$locale]['description'] ?? '';
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) use ($locale) {
                    $overrides = $model->locale_overrides ?? [];
                    $overrides[$locale]['description'] = $request->get($requestAttribute) ?: null;
                    $model->locale_overrides = $overrides;
                });

            $translationFields[] = Text::make('Button text (' . strtoupper($locale) . ')', 'locale_' . $locale . '_button_text')
                ->nullable()
                ->resolveUsing(function () use ($locale) {
                    $overrides = $this->resource->locale_overrides ?? [];

                    return $overrides[$locale]['button_text'] ?? '';
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) use ($locale) {
                    $overrides = $model->locale_overrides ?? [];
                    $overrides[$locale]['button_text'] = $request->get($requestAttribute) ?: null;
                    $model->locale_overrides = $overrides;
                });
        }

        $fields = [
            ID::make()->onlyOnForms(),
            Hidden::make('Page', 'page_id')
                ->default(function ($request) {
                    if ($request instanceof \Laravel\Nova\Http\Requests\NovaRequest && method_exists($request, 'viaResourceId')) {
                        return $request->viaResourceId() ?? 1;
                    }

                    return $request->query('viaResourceId', 1);
                }),
            Text::make('Title', 'title')->rules('required', 'string', 'max:255'),
            Textarea::make('Description', 'description')->nullable(),
            Text::make('Button text', 'button_text')->nullable(),
            Text::make('Button link', 'button_link')->nullable(),
            Text::make('Image URL', 'image')->nullable(),
            Number::make('Position', 'position')->min(0)->default(0),
            Boolean::make('Active', 'active')->default(true),
        ];

        if (!empty($translationFields)) {
            $fields[] = new Panel('Translations', $translationFields);
        }

        return $fields;
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position')->orderBy('id');
    }
}
