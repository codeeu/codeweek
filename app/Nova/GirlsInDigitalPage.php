<?php

namespace App\Nova;

use App\GirlsInDigitalButton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class GirlsInDigitalPage extends Resource
{
    public static $group = 'Content';

    public static $model = \App\GirlsInDigitalPage::class;

    public static $title = 'id';

    /** Button key => human title. Keys by section: Hero, About, Resources. */
    private static function buttonKeysBySection(): array
    {
        return [
            'hero' => [
                'gcib_sprint_hero' => 'Girls Code It Better Sprint',
            ],
            'about' => [
                'female_role_models' => 'Female Role Models Database',
                'open_call_challenges' => 'Open Call for GiD Challenges',
            ],
            'resources' => [
                'search_activity' => 'Search an activity',
                'meet_role_model' => 'Meet a Role Model',
                'organise_gcib_sprint' => 'Organise a GCIB Sprint',
                'activity_guideline' => 'Girls in Digital Activity Guideline',
                'social_media_kit' => 'Social Media Kit',
            ],
        ];
    }

    private static function allButtonKeys(): array
    {
        $out = [];
        foreach (self::buttonKeysBySection() as $keys) {
            $out = array_merge($out, array_keys($keys));
        }
        return $out;
    }

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

    /** Build a Text/Textarea/Trix that reads/writes locale_overrides[$locale][$key]. */
    private function localeField(string $label, string $locale, string $key, bool $textarea = false, bool $rich = false): Text|Textarea|Trix
    {
        $attr = 'locale_' . $locale . '_' . $key;
        if ($rich) {
            $field = Trix::make($label, $attr)->nullable();
        } else {
            $field = $textarea
                ? Textarea::make($label, $attr)->nullable()
                : Text::make($label, $attr)->nullable();
        }
        $field->resolveUsing(function () use ($locale, $key) {
            if (! $this->resource) {
                return '';
            }
            $overrides = $this->resource->locale_overrides ?? [];
            return $overrides[$locale][$key] ?? '';
        });
        $field->fillUsing(function ($request, $model, $attribute, $requestAttribute) use ($locale, $key) {
            $value = $request->get($requestAttribute);
            $overrides = $model->locale_overrides ?? [];
            if (! isset($overrides[$locale])) {
                $overrides[$locale] = [];
            }
            $overrides[$locale][$key] = $value;
            $model->locale_overrides = $overrides;
        });
        return $field;
    }

    /** Build the 4 fields for one button (enabled, url, label, open_new_tab). */
    private function buttonFields(string $key, string $title): array
    {
        return [
            Boolean::make($title . ' — Enabled', 'button_' . $key . '_enabled')
                ->resolveUsing(fn () => $this->getButtonField($key, 'enabled'))
                ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'enabled', $r->get($ra))),
            Text::make($title . ' — Link (URL)', 'button_' . $key . '_url')
                ->nullable()
                ->resolveUsing(fn () => $this->getButtonField($key, 'url'))
                ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'url', $r->get($ra))),
            Text::make($title . ' — Text (label)', 'button_' . $key . '_label')
                ->nullable()
                ->resolveUsing(fn () => $this->getButtonField($key, 'label'))
                ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'label', $r->get($ra))),
            Boolean::make($title . ' — Open in new window', 'button_' . $key . '_open_new_tab')
                ->resolveUsing(fn () => $this->getButtonField($key, 'open_new_tab'))
                ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'open_new_tab', $r->get($ra))),
        ];
    }

    public function fields(Request $request): array
    {
        try {
            return $this->buildFields($request);
        } catch (\Throwable $e) {
            report($e);
            return [
                ID::make()->onlyOnForms(),
                \Laravel\Nova\Fields\Heading::make('Error loading form: ' . $e->getMessage()),
                \Laravel\Nova\Fields\Heading::make('File: ' . $e->getFile() . ' Line: ' . $e->getLine()),
            ];
        }
    }

    private function buildFields(Request $request): array
    {
        $locales = self::localesSorted();

        $heroFields = [
            Boolean::make('Use dynamic content for this section', 'hero_dynamic')
                ->help('When on, hero uses the content below.'),
            Trix::make('Hero intro (default)', 'hero_intro')->nullable()->help('Use the toolbar for bold, italic, links, lists.'),
            Text::make('Hero video URL (default)', 'hero_video_url')->nullable()->help('YouTube embed URL.'),
            Text::make('Hero image (default)', 'hero_image')->nullable(),
        ];
        foreach ($locales as $locale) {
            if ($locale === 'en') {
                continue;
            }
            $heroFields[] = $this->localeField('Hero intro (' . strtoupper($locale) . ')', $locale, 'hero_intro', true, true);
            $heroFields[] = $this->localeField('Hero video URL (' . strtoupper($locale) . ')', $locale, 'hero_video_url', false);
        }
        foreach (self::buttonKeysBySection()['hero'] as $key => $title) {
            $heroFields = array_merge($heroFields, $this->buttonFields($key, $title));
        }

        $aboutFields = [
            Boolean::make('Use dynamic content for this section', 'about_dynamic'),
            Text::make('About title (default)', 'about_title')->nullable(),
            Trix::make('About description 1 (default)', 'about_description_1')->nullable()->help('Use the toolbar for bold, italic, links, lists.'),
            Trix::make('About description 2 (default)', 'about_description_2')->nullable()->help('Use the toolbar for bold, italic, links, lists.'),
            Text::make('About image (default)', 'about_image')->nullable(),
        ];
        foreach ($locales as $locale) {
            if ($locale === 'en') {
                continue;
            }
            $aboutFields[] = $this->localeField('About title (' . strtoupper($locale) . ')', $locale, 'about_title', false);
            $aboutFields[] = $this->localeField('About description 1 (' . strtoupper($locale) . ')', $locale, 'about_description_1', true, true);
            $aboutFields[] = $this->localeField('About description 2 (' . strtoupper($locale) . ')', $locale, 'about_description_2', true, true);
        }
        foreach (self::buttonKeysBySection()['about'] as $key => $title) {
            $aboutFields = array_merge($aboutFields, $this->buttonFields($key, $title));
        }

        $resourcesFields = [
            Boolean::make('Use dynamic content for this section', 'resources_dynamic'),
            Text::make('Resources title (default)', 'resource_title')->nullable(),
            Text::make('Young person / parent title (default)', 'resource_person_title')->nullable(),
            Trix::make('Young person / parent description 1 (default)', 'resource_person_description_1')->nullable()->help('Use the toolbar for bold, italic, links, lists.'),
            Trix::make('Young person / parent description 2 (default)', 'resource_person_description_2')->nullable()->help('Use the toolbar for bold, italic, links, lists.'),
            Text::make('Young person / parent image (default)', 'resource_young_image')->nullable(),
            Text::make('Educator title (default)', 'resource_educator_title')->nullable(),
            Trix::make('Educator description (default)', 'resource_educator_description')->nullable()->help('Use the toolbar for bold, italic, links, lists.'),
            Text::make('Educator image (default)', 'resource_educator_image')->nullable(),
        ];
        foreach ($locales as $locale) {
            if ($locale === 'en') {
                continue;
            }
            $resourcesFields[] = $this->localeField('Resource title (' . strtoupper($locale) . ')', $locale, 'resource_title', false);
            $resourcesFields[] = $this->localeField('Young person title (' . strtoupper($locale) . ')', $locale, 'resource_person_title', false);
            $resourcesFields[] = $this->localeField('Young person description 1 (' . strtoupper($locale) . ')', $locale, 'resource_person_description_1', true, true);
            $resourcesFields[] = $this->localeField('Young person description 2 (' . strtoupper($locale) . ')', $locale, 'resource_person_description_2', true, true);
            $resourcesFields[] = $this->localeField('Educator title (' . strtoupper($locale) . ')', $locale, 'resource_educator_title', false);
            $resourcesFields[] = $this->localeField('Educator description (' . strtoupper($locale) . ')', $locale, 'resource_educator_description', true, true);
        }
        foreach (self::buttonKeysBySection()['resources'] as $key => $title) {
            $resourcesFields = array_merge($resourcesFields, $this->buttonFields($key, $title));
        }

        $mattersFields = [
            Boolean::make('Use dynamic content for this section', 'matters_dynamic'),
            Text::make('Section title (default)', 'matters_title')->nullable(),
            Text::make('Graph 1 image (default)', 'matters_graph1_image')->nullable(),
            Text::make('Graph 1 link (default)', 'matters_graph1_link')->nullable(),
            Trix::make('Graph 1 caption (default)', 'matters_graph1_caption')->nullable(),
            Text::make('Graph 2 image (default)', 'matters_graph2_image')->nullable(),
            Text::make('Graph 2 link (default)', 'matters_graph2_link')->nullable(),
            Trix::make('Graph 2 caption (default)', 'matters_graph2_caption')->nullable(),
            Text::make('Graph 3 image (default)', 'matters_graph3_image')->nullable(),
            Text::make('Graph 3 link (default)', 'matters_graph3_link')->nullable(),
            Trix::make('Graph 3 caption (default)', 'matters_graph3_caption')->nullable(),
            Trix::make('Paragraph 1 (default)', 'matters_paragraph_1')->nullable()->help('Use the toolbar for bold, italic, links, lists.'),
            Trix::make('Paragraph 2 (default)', 'matters_paragraph_2')->nullable()->help('Use the toolbar for bold, italic, links, lists.'),
        ];
        foreach ($locales as $locale) {
            if ($locale === 'en') {
                continue;
            }
            $mattersFields[] = $this->localeField('Matters title (' . strtoupper($locale) . ')', $locale, 'matters_title', false);
            $mattersFields[] = $this->localeField('Matters paragraph 1 (' . strtoupper($locale) . ')', $locale, 'matters_paragraph_1', true, true);
            $mattersFields[] = $this->localeField('Matters paragraph 2 (' . strtoupper($locale) . ')', $locale, 'matters_paragraph_2', true, true);
        }

        $faqFields = [
            Boolean::make('Use dynamic content for this section', 'faq_dynamic'),
            Text::make('FAQ section title (default)', 'faq_title')->nullable(),
        ];
        foreach ($locales as $locale) {
            if ($locale === 'en') {
                continue;
            }
            $faqFields[] = $this->localeField('FAQ title (' . strtoupper($locale) . ')', $locale, 'faq_title', false);
        }
        if (Schema::hasTable('girls_in_digital_faq_items')) {
            $faqFields[] = HasMany::make('FAQ items', 'faqItems', GirlsInDigitalFaqItem::class);
        } else {
            $faqFields[] = \Laravel\Nova\Fields\Heading::make('Run migration to enable FAQ items: php artisan migrate --path=database/migrations/2026_02_12_100000_create_girls_in_digital_faq_items_table.php');
        }

        return [
            ID::make()->onlyOnForms(),

            Panel::make('Section toggles', [
                \Laravel\Nova\Fields\Heading::make('Turn on "Use dynamic content" in each section below to show DB content on the front.'),
            ])->collapsable()->collapsedByDefault(),

            Panel::make('Hero', $heroFields)->collapsable()->collapsedByDefault(),

            Panel::make('About', $aboutFields)->collapsable()->collapsedByDefault(),

            Panel::make('Resources', $resourcesFields)->collapsable()->collapsedByDefault(),

            Panel::make('Why Girls in Digital Matters', $mattersFields)->collapsable()->collapsedByDefault(),

            Panel::make('FAQ', $faqFields)->collapsable()->collapsedByDefault(),
        ];
    }

    private function getButtonField(string $key, string $field)
    {
        try {
            if (! $this->resource || ! \Illuminate\Support\Facades\Schema::hasTable('girls_in_digital_buttons')) {
                return $field === 'enabled' ? true : ($field === 'open_new_tab' ? false : '');
            }
            $button = $this->resource->buttons()->where('key', $key)->first();
            if (! $button) {
                return $field === 'enabled' ? true : ($field === 'open_new_tab' ? false : '');
            }
            return $button->{$field};
        } catch (\Throwable $e) {
            return $field === 'enabled' ? true : ($field === 'open_new_tab' ? false : '');
        }
    }

    private function fillButtonField(\App\GirlsInDigitalPage $model, string $key, string $field, $value): void
    {
        if (! isset($model->_button_updates)) {
            $model->_button_updates = [];
        }
        if (! isset($model->_button_updates[$key])) {
            $model->_button_updates[$key] = [];
        }
        if ($field === 'enabled' || $field === 'open_new_tab') {
            $value = (bool) $value;
        }
        $model->_button_updates[$key][$field] = $value;
    }

    public static function afterSave(NovaRequest $request, $model): void
    {
        try {
            if (! $model->id) {
                return;
            }
            if (! Schema::hasTable('girls_in_digital_buttons')) {
                return;
            }
            $updates = $model->_button_updates ?? null;
            if (! is_array($updates) || empty($updates)) {
                return;
            }
            $allKeys = self::allButtonKeys();
            $positionMap = array_flip($allKeys);
            foreach ($updates as $key => $fields) {
                try {
                    $existing = GirlsInDigitalButton::where('page_id', $model->id)->where('key', $key)->first();
                    $payload = [
                        'label' => array_key_exists('label', $fields) ? (string) $fields['label'] : ($existing?->label ?? ''),
                        'url' => array_key_exists('url', $fields) ? (string) $fields['url'] : ($existing?->url ?? '#'),
                        'open_new_tab' => array_key_exists('open_new_tab', $fields) ? (bool) $fields['open_new_tab'] : ($existing?->open_new_tab ?? false),
                        'enabled' => array_key_exists('enabled', $fields) ? (bool) $fields['enabled'] : ($existing?->enabled ?? true),
                        'position' => $positionMap[$key] ?? $existing?->position ?? 0,
                    ];
                    GirlsInDigitalButton::updateOrCreate(
                        ['page_id' => $model->id, 'key' => $key],
                        $payload
                    );
                } catch (\Throwable $e) {
                    report($e);
                }
            }
            unset($model->_button_updates);
        } catch (\Throwable $e) {
            report($e);
        }
    }

    public static function afterCreate(NovaRequest $request, $model): void
    {
        self::afterSave($request, $model);
    }

    public static function afterUpdate(NovaRequest $request, $model): void
    {
        self::afterSave($request, $model);
    }
}
