<?php

namespace App\Nova;

use App\GirlsInDigitalButton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
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

    /**
     * Permissive update rules so form submission does not fail on strict validation.
     */
    public static function rulesForUpdate(NovaRequest $request, $resource = null): array
    {
        return [];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->where('id', 1);
    }

    /** Build the 4 fields for one button (enabled, url, label, open_new_tab). */
    private function buttonFields(string $key, string $title, string $dynamicAttribute): array
    {
        $hideWhenSectionOff = function ($field, $request, $formData) use ($dynamicAttribute) {
            if (! $formData->get($dynamicAttribute)) {
                $field->exceptOnForms();
            }
        };

        return [
            Boolean::make($title . ' — Enabled', 'button_' . $key . '_enabled')
                ->resolveUsing(fn () => $this->getButtonField($key, 'enabled'))
                ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'enabled', $r->get($ra)))
                ->dependsOn($dynamicAttribute, $hideWhenSectionOff),
            Text::make($title . ' — Link (URL)', 'button_' . $key . '_url')
                ->nullable()
                ->resolveUsing(fn () => $this->getButtonField($key, 'url'))
                ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'url', $r->get($ra)))
                ->dependsOn($dynamicAttribute, $hideWhenSectionOff),
            Text::make($title . ' — Text (label)', 'button_' . $key . '_label')
                ->nullable()
                ->resolveUsing(fn () => $this->getButtonField($key, 'label'))
                ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'label', $r->get($ra)))
                ->dependsOn($dynamicAttribute, $hideWhenSectionOff),
            Boolean::make($title . ' — Open in new window', 'button_' . $key . '_open_new_tab')
                ->resolveUsing(fn () => $this->getButtonField($key, 'open_new_tab'))
                ->fillUsing(fn ($r, $m, $a, $ra) => $this->fillButtonField($m, $key, 'open_new_tab', $r->get($ra)))
                ->dependsOn($dynamicAttribute, $hideWhenSectionOff),
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

    /** Hide field from form when the given dynamic toggle is off. Use form data when present, else the resource's value (initial load). */
    private function hideWhenSectionOff(string $dynamicAttribute): \Closure
    {
        return function ($field, $request, $formData) use ($dynamicAttribute) {
            $value = $formData->get($dynamicAttribute);
            if ($value === null && $request->resourceId ?? null) {
                try {
                    $model = $request->findResourceOrFail();
                    $value = $model->getAttribute($dynamicAttribute);
                } catch (\Throwable $e) {
                    // ignore
                }
            }
            if ($value === false || $value === '0' || $value === 0) {
                $field->exceptOnForms();
            }
        };
    }

    private function buildFields(Request $request): array
    {
        // — Hero: toggle first, then content/buttons only when "Use dynamic content" is on
        $heroFields = [
            Boolean::make('Use dynamic content for this section', 'hero_dynamic')
                ->help('When on, hero uses the content below.'),
            Trix::make('Hero intro', 'hero_intro')->nullable()->help('Use the toolbar for bold, italic, links, lists.')
                ->dependsOn('hero_dynamic', $this->hideWhenSectionOff('hero_dynamic')),
            Text::make('Hero video URL', 'hero_video_url')->nullable()->help('YouTube embed URL.')
                ->dependsOn('hero_dynamic', $this->hideWhenSectionOff('hero_dynamic')),
            Text::make('Hero image', 'hero_image')->nullable()
                ->dependsOn('hero_dynamic', $this->hideWhenSectionOff('hero_dynamic')),
        ];
        foreach (self::buttonKeysBySection()['hero'] as $key => $title) {
            $heroFields = array_merge($heroFields, $this->buttonFields($key, $title, 'hero_dynamic'));
        }

        // — About: toggle first, then content/buttons only when dynamic is on
        $aboutFields = [
            Boolean::make('Use dynamic content for this section', 'about_dynamic'),
            Text::make('About title', 'about_title')->nullable()
                ->dependsOn('about_dynamic', $this->hideWhenSectionOff('about_dynamic')),
            Trix::make('About description 1', 'about_description_1')->nullable()->help('Use the toolbar for bold, italic, links, lists.')
                ->dependsOn('about_dynamic', $this->hideWhenSectionOff('about_dynamic')),
            Trix::make('About description 2', 'about_description_2')->nullable()->help('Use the toolbar for bold, italic, links, lists.')
                ->dependsOn('about_dynamic', $this->hideWhenSectionOff('about_dynamic')),
            Text::make('About image', 'about_image')->nullable()
                ->dependsOn('about_dynamic', $this->hideWhenSectionOff('about_dynamic')),
        ];
        foreach (self::buttonKeysBySection()['about'] as $key => $title) {
            $aboutFields = array_merge($aboutFields, $this->buttonFields($key, $title, 'about_dynamic'));
        }

        // — Resources: toggle first, then content/buttons only when dynamic is on
        $resourcesFields = [
            Boolean::make('Use dynamic content for this section', 'resources_dynamic'),
            Text::make('Resources title', 'resource_title')->nullable()
                ->dependsOn('resources_dynamic', $this->hideWhenSectionOff('resources_dynamic')),
            Text::make('Young person / parent title', 'resource_person_title')->nullable()
                ->dependsOn('resources_dynamic', $this->hideWhenSectionOff('resources_dynamic')),
            Trix::make('Young person / parent description 1', 'resource_person_description_1')->nullable()->help('Use the toolbar for bold, italic, links, lists.')
                ->dependsOn('resources_dynamic', $this->hideWhenSectionOff('resources_dynamic')),
            Trix::make('Young person / parent description 2', 'resource_person_description_2')->nullable()->help('Use the toolbar for bold, italic, links, lists.')
                ->dependsOn('resources_dynamic', $this->hideWhenSectionOff('resources_dynamic')),
            Text::make('Young person / parent image', 'resource_young_image')->nullable()
                ->dependsOn('resources_dynamic', $this->hideWhenSectionOff('resources_dynamic')),
            Text::make('Educator title', 'resource_educator_title')->nullable()
                ->dependsOn('resources_dynamic', $this->hideWhenSectionOff('resources_dynamic')),
            Trix::make('Educator description', 'resource_educator_description')->nullable()->help('Use the toolbar for bold, italic, links, lists.')
                ->dependsOn('resources_dynamic', $this->hideWhenSectionOff('resources_dynamic')),
            Text::make('Educator image', 'resource_educator_image')->nullable()
                ->dependsOn('resources_dynamic', $this->hideWhenSectionOff('resources_dynamic')),
        ];
        foreach (self::buttonKeysBySection()['resources'] as $key => $title) {
            $resourcesFields = array_merge($resourcesFields, $this->buttonFields($key, $title, 'resources_dynamic'));
        }

        // — Why Matters: toggle first, then content only when dynamic is on
        $mattersFields = [
            Boolean::make('Use dynamic content for this section', 'matters_dynamic'),
            Text::make('Section title', 'matters_title')->nullable()
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Text::make('Graph 1 image', 'matters_graph1_image')->nullable()
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Text::make('Graph 1 link', 'matters_graph1_link')->nullable()
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Trix::make('Graph 1 caption', 'matters_graph1_caption')->nullable()
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Text::make('Graph 2 image', 'matters_graph2_image')->nullable()
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Text::make('Graph 2 link', 'matters_graph2_link')->nullable()
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Trix::make('Graph 2 caption', 'matters_graph2_caption')->nullable()
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Text::make('Graph 3 image', 'matters_graph3_image')->nullable()
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Text::make('Graph 3 link', 'matters_graph3_link')->nullable()
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Trix::make('Graph 3 caption', 'matters_graph3_caption')->nullable()
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Trix::make('Paragraph 1', 'matters_paragraph_1')->nullable()->help('Use the toolbar for bold, italic, links, lists.')
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
            Trix::make('Paragraph 2', 'matters_paragraph_2')->nullable()->help('Use the toolbar for bold, italic, links, lists.')
                ->dependsOn('matters_dynamic', $this->hideWhenSectionOff('matters_dynamic')),
        ];

        // — FAQ: toggle first, then content only when dynamic is on
        $faqFields = [
            Boolean::make('Use dynamic content for this section', 'faq_dynamic'),
            Text::make('FAQ section title', 'faq_title')->nullable()
                ->dependsOn('faq_dynamic', $this->hideWhenSectionOff('faq_dynamic')),
        ];
        if (Schema::hasTable('girls_in_digital_faq_items')) {
            $faqFields[] = HasMany::make('FAQ items', 'faqItems', GirlsInDigitalFaqItem::class)
                ->fillUsing(function () {
                    // Do not set faqItems on the parent; children are managed separately.
                })
                ->dependsOn('faq_dynamic', $this->hideWhenSectionOff('faq_dynamic'));
        } else {
            $faqFields[] = \Laravel\Nova\Fields\Heading::make('Run migration to enable FAQ items: php artisan migrate --path=database/migrations/2026_02_12_100000_create_girls_in_digital_faq_items_table.php');
        }

        // All sections are collapsible accordions, closed by default
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
        try {
            if (! isset($model->nonPersistedButtonUpdates)) {
                $model->nonPersistedButtonUpdates = [];
            }
            if (! isset($model->nonPersistedButtonUpdates[$key])) {
                $model->nonPersistedButtonUpdates[$key] = [];
            }
            if ($field === 'enabled' || $field === 'open_new_tab') {
                $value = (bool) $value;
            }
            $model->nonPersistedButtonUpdates[$key][$field] = $value;
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('GirlsInDigital button field fill failed: ' . $key . '.' . $field, [
                'exception' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            throw $e;
        }
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
            $updates = $model->nonPersistedButtonUpdates ?? null;
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
            unset($model->nonPersistedButtonUpdates);
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
