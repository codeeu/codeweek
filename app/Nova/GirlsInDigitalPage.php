<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class GirlsInDigitalPage extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GirlsInDigitalPage::class;

    public static $title = 'id';

    public static function label()
    {
        return 'Girls in Digital';
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

    /** Hide from index – single resource, edit from detail. */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('id', 1);
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
        $localePanels = [];
        foreach ($locales as $locale) {
            $localePanels[] = new Panel('Override: ' . strtoupper($locale), [
                Code::make('[' . $locale . ']', 'locale_override_' . $locale)
                    ->json()
                    ->nullable()
                    ->help('Optional. Override text/buttons for this locale. Keys: ' . implode(', ', \App\GirlsInDigitalPage::contentKeys()) . '. For buttons use "buttons": [{"key":"gcib_sprint_hero","label":"...","url":"...","open_new_tab":false,"enabled":true,"position":0}].')
                    ->resolveUsing(function () use ($locale) {
                        $overrides = $this->resource->locale_overrides ?? [];
                        return $overrides[$locale] ?? [];
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

            Boolean::make('Use dynamic content', 'use_dynamic_content')
                ->help('When on, the Girls in Digital page uses the content below. When off, the static blade content is shown (current hardcoded text/images). Defaults to English for all languages; use locale overrides below for other languages.'),

            new Panel('Hero', [
                Textarea::make('Hero intro', 'hero_intro')
                    ->nullable()
                    ->help('Default (English) hero text. Leave empty to use static/lang.'),
                Text::make('Hero video URL', 'hero_video_url')
                    ->nullable()
                    ->help('YouTube embed URL, e.g. https://www.youtube.com/embed/...'),
            ]),

            new Panel('About', [
                Text::make('About title', 'about_title')->nullable(),
                Textarea::make('About description 1', 'about_description_1')->nullable(),
                Textarea::make('About description 2', 'about_description_2')->nullable()->help('HTML allowed.'),
            ]),

            new Panel('Resources', [
                Text::make('Resources title', 'resource_title')->nullable(),
                Text::make('Young person / parent title', 'resource_person_title')->nullable(),
                Textarea::make('Young person / parent description 1', 'resource_person_description_1')->nullable(),
                Textarea::make('Young person / parent description 2', 'resource_person_description_2')->nullable(),
                Text::make('Educator title', 'resource_educator_title')->nullable(),
                Textarea::make('Educator description', 'resource_educator_description')->nullable(),
            ]),

            new Panel('Buttons', [
                Code::make('Buttons', 'buttons')
                    ->json()
                    ->nullable()
                    ->help('Array of buttons. Each: {"key":"gcib_sprint_hero","label":"Girls Code It Better Sprint","url":"https://...","open_new_tab":false,"enabled":true,"position":0}. Keys: gcib_sprint_hero, female_role_models, open_call_challenges, search_activity, meet_role_model, organise_gcib_sprint, activity_guideline, social_media_kit. Disabled buttons are hidden.'),
            ]),

            new Panel('Per-locale overrides (optional)', [
                \Laravel\Nova\Fields\Heading::make('Expand a locale to override text or button labels for that language. Defaults to English for all.'),
                ...$localePanels,
            ]),
        ];
    }
}
