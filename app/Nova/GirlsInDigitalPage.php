<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class GirlsInDigitalPage extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GirlsInDigitalPage::class;

    public static $title = 'id';

    public static function label()
    {
        return 'Girls in Digital – Page content';
    }

    public static function singularLabel()
    {
        return 'Girls in Digital Page';
    }

    public static function authorizedToViewAny(Request $request): bool
    {
        return true;
    }

    public static function uriKey(): string
    {
        return 'girls-in-digital-page';
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

    /** Content keys that can be overridden per locale (from resources/lang/xx/girls-in-digital.php). */
    public static function contentKeys(): array
    {
        return [
            'landing_header',
            'about_girls_title',
            'about_girls_description_1',
            'about_girls_description_2',
            'resource_title',
            'resource_person_title',
            'resource_person_description_1',
            'resource_person_description_2',
            'resource_educator_title',
            'resource_educator_description',
            'resource_search_activity',
            'resource_organise_activity',
            'resource_digital_activity',
            'resource_social_media',
        ];
    }

    public function fields(Request $request): array
    {
        $locales = self::localesSorted();
        $keysHelp = 'Optional keys: ' . implode(', ', self::contentKeys());

        $localePanels = [];
        foreach ($locales as $locale) {
            $localePanels[] = new Panel('Override: ' . strtoupper($locale), [
                Code::make('[' . $locale . ']', 'locale_override_' . $locale)
                    ->json()
                    ->nullable()
                    ->help($keysHelp)
                    ->resolveUsing(function () use ($locale) {
                        $overrides = $this->resource->locale_overrides ?? [];
                        $data = $overrides[$locale] ?? [];
                        return $data;
                    })
                    ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                        $locale = str_replace('locale_override_', '', $attribute);
                        $value = $request->get($requestAttribute);
                        $overrides = $model->locale_overrides ?? [];
                        $overrides[$locale] = is_string($value) ? (json_decode($value, true) ?? []) : (is_array($value) ? $value : []);
                        $model->locale_overrides = $overrides;
                    }),
            ]);
        }

        return [
            ID::make()->onlyOnForms(),
            new Panel('Per-locale content overrides (optional)', [
                \Laravel\Nova\Fields\Heading::make('Expand a locale below to override text for that language. Defaults come from resources/lang/{locale}/girls-in-digital.php.'),
                ...$localePanels,
            ]),
        ];
    }
}
