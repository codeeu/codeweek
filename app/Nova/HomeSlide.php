<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
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

    public function fields(Request $request): array
    {
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
                Code::make('Locale overrides', 'locale_overrides')
                    ->json()
                    ->nullable()
                    ->help(
                        'Optional. Override text per locale. Use "Export locale overrides (CSV)" to download a template, edit in Excel, then "Import locale overrides (CSV)" to apply. ' .
                        'Or enter JSON: {"es": {"title": "Título", "description": "...", "button_text": "Ver", "button2_text": ""}}. Leave empty to use lang keys above.'
                    ),
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
