<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class GirlsInDigitalFaqItem extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GirlsInDigitalFaqItem::class;

    public static $title = 'question';

    public static $search = ['question', 'answer'];

    public static function label()
    {
        return 'Girls in Digital FAQ Item';
    }

    public static function singularLabel()
    {
        return 'FAQ Item';
    }

    public static function uriKey(): string
    {
        return 'girls-in-digital-faq-items';
    }

    /** Only manage FAQ items from the Girls in Digital page (HasMany). */
    public static $displayInNavigation = false;

    public static function authorizedToCreate(Request $request): bool
    {
        return true;
    }

    public function authorizedToUpdate(Request $request): bool
    {
        return true;
    }

    public function authorizedToDelete(Request $request): bool
    {
        return true;
    }

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
        $locales = self::localesSorted();
        $translationFields = [];

        foreach ($locales as $locale) {
            if ($locale === 'en') {
                continue;
            }
            $translationFields[] = Text::make('Question (' . strtoupper($locale) . ')', 'locale_' . $locale . '_question')
                ->nullable()
                ->resolveUsing(function () use ($locale) {
                    $overrides = $this->resource->locale_overrides ?? [];
                    return $overrides[$locale]['question'] ?? '';
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) use ($locale) {
                    $value = $request->get($requestAttribute);
                    $overrides = $model->locale_overrides ?? [];
                    if (! isset($overrides[$locale])) {
                        $overrides[$locale] = [];
                    }
                    $overrides[$locale]['question'] = $value;
                    $model->locale_overrides = $overrides;
                });
            $translationFields[] = Trix::make('Answer (' . strtoupper($locale) . ')', 'locale_' . $locale . '_answer')
                ->nullable()
                ->resolveUsing(function () use ($locale) {
                    $overrides = $this->resource->locale_overrides ?? [];
                    return $overrides[$locale]['answer'] ?? '';
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) use ($locale) {
                    $value = $request->get($requestAttribute);
                    $overrides = $model->locale_overrides ?? [];
                    if (! isset($overrides[$locale])) {
                        $overrides[$locale] = [];
                    }
                    $overrides[$locale]['answer'] = $value;
                    $model->locale_overrides = $overrides;
                });
        }

        $fields = [
            ID::make()->onlyOnForms(),
            \Laravel\Nova\Fields\Hidden::make('Page', 'page_id')
                ->default(function ($request) {
                    if ($request instanceof \Laravel\Nova\Http\Requests\NovaRequest && method_exists($request, 'viaResourceId')) {
                        return $request->viaResourceId() ?? 1;
                    }
                    return $request->query('viaResourceId', 1);
                }),
            Text::make('Question (default)', 'question')->nullable()->rules('nullable', 'string'),
            Trix::make('Answer (default)', 'answer')->nullable()->help('Use the toolbar for bold, italic, links, lists.'),
            \Laravel\Nova\Fields\Number::make('Order', 'position')->min(0)->help('Lower numbers appear first.'),
        ];

        if (count($translationFields) > 0) {
            $fields[] = new Panel('Translations', $translationFields);
        }

        return $fields;
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position');
    }

    public static function relatableQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position');
    }
}
