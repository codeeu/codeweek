<?php

namespace App\Nova;

use App\GirlsInDigitalButton;
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

    /** Button keys for the 8 fixed buttons (same order as blade). */
    private static function buttonKeys(): array
    {
        return [
            'gcib_sprint_hero' => 'Girls Code It Better Sprint',
            'female_role_models' => 'Female Role Models Database',
            'open_call_challenges' => 'Open Call for GiD Challenges',
            'search_activity' => 'Search an activity',
            'meet_role_model' => 'Meet a Role Model',
            'organise_gcib_sprint' => 'Organise a GCIB Sprint',
            'activity_guideline' => 'Girls in Digital Activity Guideline',
            'social_media_kit' => 'Social Media Kit',
        ];
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
                    ->help('Optional. Override text for this locale. Keys: ' . implode(', ', \App\GirlsInDigitalPage::contentKeys()) . '. faq_items: [{"question":"...","answer":"..."}].')
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

        $buttonPanels = [];
        foreach (self::buttonKeys() as $key => $title) {
            $buttonPanels[] = new Panel('Button: ' . $title, [
                Boolean::make('Enabled', 'button_' . $key . '_enabled')
                    ->resolveUsing(fn () => $this->getButtonField($key, 'enabled'))
                    ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'enabled', $r->get($ra))),
                Text::make('Link (URL)', 'button_' . $key . '_url')
                    ->nullable()
                    ->resolveUsing(fn () => $this->getButtonField($key, 'url'))
                    ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'url', $r->get($ra))),
                Text::make('Text (label)', 'button_' . $key . '_label')
                    ->nullable()
                    ->resolveUsing(fn () => $this->getButtonField($key, 'label'))
                    ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'label', $r->get($ra))),
                Boolean::make('Open in new window', 'button_' . $key . '_open_new_tab')
                    ->resolveUsing(fn () => $this->getButtonField($key, 'open_new_tab'))
                    ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'open_new_tab', $r->get($ra))),
            ]);
        }

        return [
            ID::make()->onlyOnForms(),

            new Panel('Section toggles (use dynamic content per section)', [
                Boolean::make('Hero dynamic', 'hero_dynamic')->help('Use DB content for hero (intro, video, image).'),
                Boolean::make('About dynamic', 'about_dynamic')->help('Use DB content for about section.'),
                Boolean::make('Resources dynamic', 'resources_dynamic')->help('Use DB content for resources section.'),
                Boolean::make('Why matters dynamic', 'matters_dynamic')->help('Use DB content for "Why Girls in Digital Matters" section.'),
                Boolean::make('FAQ dynamic', 'faq_dynamic')->help('Use DB content for FAQ (title + items).'),
            ]),

            new Panel('Hero', [
                Textarea::make('Hero intro', 'hero_intro')->nullable(),
                Text::make('Hero video URL', 'hero_video_url')->nullable()->help('YouTube embed URL.'),
                Text::make('Hero image', 'hero_image')->nullable()->help('Path or URL for hero image.'),
            ]),

            new Panel('About', [
                Text::make('About title', 'about_title')->nullable(),
                Textarea::make('About description 1', 'about_description_1')->nullable(),
                Textarea::make('About description 2', 'about_description_2')->nullable()->help('HTML allowed.'),
                Text::make('About image', 'about_image')->nullable(),
            ]),

            new Panel('Resources', [
                Text::make('Resources title', 'resource_title')->nullable(),
                Text::make('Young person / parent title', 'resource_person_title')->nullable(),
                Textarea::make('Young person / parent description 1', 'resource_person_description_1')->nullable(),
                Textarea::make('Young person / parent description 2', 'resource_person_description_2')->nullable(),
                Text::make('Young person / parent image', 'resource_young_image')->nullable(),
                Text::make('Educator title', 'resource_educator_title')->nullable(),
                Textarea::make('Educator description', 'resource_educator_description')->nullable(),
                Text::make('Educator image', 'resource_educator_image')->nullable(),
            ]),

            new Panel('Why Girls in Digital Matters', [
                Text::make('Section title', 'matters_title')->nullable(),
                Text::make('Graph 1 image', 'matters_graph1_image')->nullable(),
                Text::make('Graph 1 link', 'matters_graph1_link')->nullable(),
                Textarea::make('Graph 1 caption', 'matters_graph1_caption')->nullable(),
                Text::make('Graph 2 image', 'matters_graph2_image')->nullable(),
                Text::make('Graph 2 link', 'matters_graph2_link')->nullable(),
                Textarea::make('Graph 2 caption', 'matters_graph2_caption')->nullable(),
                Text::make('Graph 3 image', 'matters_graph3_image')->nullable(),
                Text::make('Graph 3 link', 'matters_graph3_link')->nullable(),
                Textarea::make('Graph 3 caption', 'matters_graph3_caption')->nullable(),
                Textarea::make('Paragraph 1', 'matters_paragraph_1')->nullable(),
                Textarea::make('Paragraph 2', 'matters_paragraph_2')->nullable(),
            ]),

            new Panel('FAQ', [
                Text::make('FAQ section title', 'faq_title')->nullable(),
                Code::make('FAQ items', 'faq_items')
                    ->json()
                    ->nullable()
                    ->help('Array of {"question":"...","answer":"..."}. HTML allowed in answer.'),
            ]),

            ...$buttonPanels,

            new Panel('Per-locale overrides (optional)', [
                \Laravel\Nova\Fields\Heading::make('Expand a locale to override text for that language.'),
                ...$localePanels,
            ]),
        ];
    }

    private function getButtonField(string $key, string $field)
    {
        $button = $this->resource->buttons()->where('key', $key)->first();
        if (! $button) {
            return $field === 'enabled' ? true : ($field === 'open_new_tab' ? false : '');
        }
        return $button->{$field};
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
        $updates = $model->_button_updates ?? null;
        if (! is_array($updates) || empty($updates)) {
            return;
        }
        $positionMap = array_flip(array_keys(self::buttonKeys()));
        foreach ($updates as $key => $fields) {
            $existing = GirlsInDigitalButton::where('page_id', $model->id)->where('key', $key)->first();
            $payload = [
                'label' => $fields['label'] ?? $existing?->label ?? '',
                'url' => $fields['url'] ?? $existing?->url ?? '#',
                'open_new_tab' => array_key_exists('open_new_tab', $fields) ? (bool) $fields['open_new_tab'] : ($existing?->open_new_tab ?? false),
                'enabled' => array_key_exists('enabled', $fields) ? (bool) $fields['enabled'] : ($existing?->enabled ?? true),
                'position' => $positionMap[$key] ?? $existing?->position ?? 0,
            ];
            GirlsInDigitalButton::updateOrCreate(
                ['page_id' => $model->id, 'key' => $key],
                $payload
            );
        }
        unset($model->_button_updates);
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
