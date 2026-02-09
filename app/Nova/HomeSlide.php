<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use App\Nova\Actions\ExportHomeSlideLocaleOverrides;
use App\Nova\Actions\ImportHomeSlideLocaleOverrides;

class HomeSlide extends Resource
{
    public static $group = 'Content';

    public static $model = \App\HomeSlide::class;

    public static $title = 'title';

    public static $search = ['title', 'description'];

    public static function label()
    {
        return 'Homepage Slides';
    }

    public static function singularLabel()
    {
        return 'Homepage Slide';
    }

    public static function authorizedToViewAny(Request $request): bool
    {
        return true;
    }

    /**
     * Lang keys from resources/lang/en/home.php for dropdown fallback.
     *
     * @return array<string, string> key => label (key as label for clarity)
     */
    public static function homeLangKeys(): array
    {
        $path = resource_path('lang/en/home.php');
        if (! File::exists($path)) {
            return [];
        }
        $keys = array_keys(require $path);
        $prefixed = [];
        foreach ($keys as $key) {
            $full = 'home.' . $key;
            $prefixed[$full] = $full;
        }
        return $prefixed;
    }

    /**
     * Locale codes from config (LOCALES env), sorted A–Z. Used for override rows and CSV.
     *
     * @return list<string>
     */
    public static function localesSorted(): array
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

    /**
     * Locale codes as options (key => label).
     *
     * @return array<string, string>
     */
    public static function localeOptions(): array
    {
        $out = [];
        foreach (self::localesSorted() as $locale) {
            $out[$locale] = $locale;
        }
        return $out;
    }

    private const OVERRIDE_KEYS = ['title', 'description', 'button_text', 'button2_text'];

    private static function parseOverrideAttribute(string $attribute): ?array
    {
        if (! str_starts_with($attribute, 'override_') || strlen($attribute) < 12) {
            return null;
        }
        $rest = substr($attribute, 9);
        $parts = explode('_', $rest);
        if (count($parts) < 2) {
            return null;
        }
        $locale = $parts[0];
        $key = implode('_', array_slice($parts, 1));
        if (! in_array($key, self::OVERRIDE_KEYS, true)) {
            return null;
        }
        return ['locale' => $locale, 'key' => $key];
    }

    public function fields(Request $request): array
    {
        $locales = self::localesSorted();
        $overrideFields = [];

        foreach ($locales as $locale) {
            $overrideFields[] = Text::make('[' . $locale . '] Title', 'override_' . $locale . '_title')
                ->nullable()
                ->onlyOnForms()
                ->hideFromIndex()
                ->resolveUsing(function () use ($locale) {
                    $overrides = $this->resource->locale_overrides ?? [];
                    return $overrides[$locale]['title'] ?? '';
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    $parsed = self::parseOverrideAttribute($attribute);
                    if ($parsed === null) {
                        return;
                    }
                    $overrides = $model->locale_overrides ?? [];
                    if (! isset($overrides[$parsed['locale']])) {
                        $overrides[$parsed['locale']] = [];
                    }
                    $overrides[$parsed['locale']][$parsed['key']] = $request->get($requestAttribute) ?: null;
                    $model->locale_overrides = $overrides;
                });

            $overrideFields[] = Textarea::make('[' . $locale . '] Description', 'override_' . $locale . '_description')
                ->nullable()
                ->onlyOnForms()
                ->hideFromIndex()
                ->resolveUsing(function () use ($locale) {
                    $overrides = $this->resource->locale_overrides ?? [];
                    return $overrides[$locale]['description'] ?? '';
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    $parsed = self::parseOverrideAttribute($attribute);
                    if ($parsed === null) {
                        return;
                    }
                    $overrides = $model->locale_overrides ?? [];
                    if (! isset($overrides[$parsed['locale']])) {
                        $overrides[$parsed['locale']] = [];
                    }
                    $overrides[$parsed['locale']][$parsed['key']] = $request->get($requestAttribute) ?: null;
                    $model->locale_overrides = $overrides;
                });

            $overrideFields[] = Text::make('[' . $locale . '] Button', 'override_' . $locale . '_button_text')
                ->nullable()
                ->onlyOnForms()
                ->hideFromIndex()
                ->resolveUsing(function () use ($locale) {
                    $overrides = $this->resource->locale_overrides ?? [];
                    return $overrides[$locale]['button_text'] ?? '';
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    $parsed = self::parseOverrideAttribute($attribute);
                    if ($parsed === null) {
                        return;
                    }
                    $overrides = $model->locale_overrides ?? [];
                    if (! isset($overrides[$parsed['locale']])) {
                        $overrides[$parsed['locale']] = [];
                    }
                    $overrides[$parsed['locale']][$parsed['key']] = $request->get($requestAttribute) ?: null;
                    $model->locale_overrides = $overrides;
                });

            $overrideFields[] = Text::make('[' . $locale . '] Button 2', 'override_' . $locale . '_button2_text')
                ->nullable()
                ->onlyOnForms()
                ->hideFromIndex()
                ->resolveUsing(function () use ($locale) {
                    $overrides = $this->resource->locale_overrides ?? [];
                    return $overrides[$locale]['button2_text'] ?? '';
                })
                ->fillUsing(function ($request, $model, $attribute, $requestAttribute) {
                    $parsed = self::parseOverrideAttribute($attribute);
                    if ($parsed === null) {
                        return;
                    }
                    $overrides = $model->locale_overrides ?? [];
                    if (! isset($overrides[$parsed['locale']])) {
                        $overrides[$parsed['locale']] = [];
                    }
                    $overrides[$parsed['locale']][$parsed['key']] = $request->get($requestAttribute) ?: null;
                    $model->locale_overrides = $overrides;
                });
        }

        return [
            ID::make()->sortable(),

            Text::make('Title', 'title')
                ->rules('required')
                ->help('Lang key (e.g. home.banner4_title) for automatic translation per locale from resources/lang/en/home.php, or plain text. English is default.'),

            Textarea::make('Description', 'description')
                ->nullable()
                ->help('Lang key (e.g. home.banner4_description) or plain text. Translated via resources/lang per locale.'),

            Text::make('Primary button URL', 'url')->rules('required')->hideFromIndex(),
            Text::make('Primary button label', 'button_text')
                ->rules('required')
                ->help('Lang key (e.g. home.learn_more, home.view_winners) or plain text.'),
            Boolean::make('Open primary link in new tab', 'open_primary_new_tab')
                ->help('Open the primary button link in a new window/tab.'),
            Text::make('Second button URL', 'url2')->nullable()->hideFromIndex(),
            Text::make('Second button label', 'button2_text')
                ->nullable()
                ->help('Leave empty to hide second button. Lang key or plain text.'),
            Boolean::make('Open second link in new tab', 'open_second_new_tab')
                ->help('Open the second button link in a new window/tab.'),
            Text::make('Image', 'image')
                ->nullable()
                ->help('Path from site root e.g. images/dream-jobs/dream_jobs_bg.png (no leading slash), or full URL. Used as slide background.'),
            Number::make('Position', 'position')
                ->min(0)
                ->default(0)
                ->help('Lower = first. Order of slides on homepage.'),
            Boolean::make('Active', 'active'),
            Boolean::make('Show countdown', 'show_countdown')
                ->help('Show countdown timer on this slide (usually first slide).'),
            DateTime::make('Countdown target', 'countdown_target')
                ->nullable()
                ->help('Target date/time for countdown (e.g. Code Week start). Only used if Show countdown is on.'),

            new Panel('Per-locale overrides (optional)', [
                \Laravel\Nova\Fields\Heading::make('One row per locale (A–Z). Columns: Title, Description, Button, Button 2. Use Export/Import CSV for bulk edit.'),
                ...$overrideFields,
            ]),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('position')->orderBy('id');
    }

    public function actions(NovaRequest $request): array
    {
        return [
            new ExportHomeSlideLocaleOverrides,
            new ImportHomeSlideLocaleOverrides,
        ];
    }
}
