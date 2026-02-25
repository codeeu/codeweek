<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class HackathonsPage extends Resource
{
    public static $group = 'Content';

    public static $model = \App\HackathonsPage::class;

    public static $title = 'id';

    public static function label()
    {
        return 'Hackathons Page';
    }

    public static function singularLabel()
    {
        return 'Hackathons Page';
    }

    public static function uriKey(): string
    {
        return 'hackathons-page';
    }

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
        $translationKeys = [
            'hero_title' => 'Hero title',
            'hero_subtitle' => 'Hero subtitle',
            'intro_title' => 'Intro title',
            'intro_paragraph_1' => 'Intro paragraph 1',
            'intro_paragraph_2' => 'Intro paragraph 2',
            'details_title' => 'Details title',
            'details_paragraph_1' => 'Details paragraph 1',
            'details_paragraph_2' => 'Details paragraph 2',
            'details_paragraph_3' => 'Details paragraph 3',
            'details_paragraph_4' => 'Details paragraph 4',
            'recap_button_text' => 'Recap button text',
            'toolkit_button_text' => 'Toolkit button text',
        ];

        $longTextKeys = [
            'hero_subtitle',
            'intro_paragraph_1',
            'intro_paragraph_2',
            'details_paragraph_1',
            'details_paragraph_2',
            'details_paragraph_3',
            'details_paragraph_4',
        ];

        $translationFields = [];
        foreach (self::localesSorted() as $locale) {
            if ($locale === 'en') {
                continue;
            }

            foreach ($translationKeys as $key => $label) {
                $fieldName = 'locale_' . $locale . '_' . $key;
                if (in_array($key, $longTextKeys, true)) {
                    $translationFields[] = Trix::make($label . ' (' . strtoupper($locale) . ')', $fieldName)
                        ->nullable()
                        ->resolveUsing(function () use ($locale, $key) {
                            $overrides = $this->resource->locale_overrides ?? [];

                            return $overrides[$locale][$key] ?? '';
                        })
                        ->fillUsing(function ($request, $model, $attribute, $requestAttribute) use ($locale, $key) {
                            $overrides = $model->locale_overrides ?? [];
                            $overrides[$locale][$key] = $request->get($requestAttribute) ?: null;
                            $model->locale_overrides = $overrides;
                        });
                } else {
                    $translationFields[] = Text::make($label . ' (' . strtoupper($locale) . ')', $fieldName)
                        ->nullable()
                        ->resolveUsing(function () use ($locale, $key) {
                            $overrides = $this->resource->locale_overrides ?? [];

                            return $overrides[$locale][$key] ?? '';
                        })
                        ->fillUsing(function ($request, $model, $attribute, $requestAttribute) use ($locale, $key) {
                            $overrides = $model->locale_overrides ?? [];
                            $overrides[$locale][$key] = $request->get($requestAttribute) ?: null;
                            $model->locale_overrides = $overrides;
                        });
                }
            }
        }

        $fields = [
            ID::make()->onlyOnForms(),
            Boolean::make('Use dynamic content', 'dynamic_content')
                ->help('Keep OFF to use current static template content. Turn ON to use the values below.'),

            Panel::make('Hero', [
                Text::make('Hero title', 'hero_title')->nullable(),
                Trix::make('Hero subtitle', 'hero_subtitle')->nullable(),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Intro section', [
                Text::make('Intro title', 'intro_title')->nullable(),
                Trix::make('Intro paragraph 1', 'intro_paragraph_1')->nullable(),
                Trix::make('Intro paragraph 2', 'intro_paragraph_2')->nullable(),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Details section', [
                Text::make('Details title', 'details_title')->nullable(),
                Trix::make('Details paragraph 1', 'details_paragraph_1')->nullable(),
                Trix::make('Details paragraph 2', 'details_paragraph_2')->nullable(),
                Trix::make('Details paragraph 3', 'details_paragraph_3')->nullable(),
                Trix::make('Details paragraph 4', 'details_paragraph_4')->nullable(),
                Text::make('Video URL (embed)', 'video_url')->nullable(),
                Text::make('Recap button text', 'recap_button_text')->nullable(),
                Text::make('Recap button link', 'recap_button_link')->nullable(),
                Text::make('Toolkit button text', 'toolkit_button_text')->nullable(),
                Text::make('Toolkit button link', 'toolkit_button_link')->nullable(),
            ])->collapsable()->collapsedByDefault(),
        ];

        if (!empty($translationFields)) {
            $fields[] = new Panel('Translations', $translationFields);
        }

        return $fields;
    }
}
