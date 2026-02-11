<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class GirlsInDigitalPage extends Model
{
    protected $table = 'girls_in_digital_page';

    /** Content key => DB column (when different). */
    protected static $contentKeyToColumn = [
        'landing_header' => 'hero_intro',
        'about_girls_title' => 'about_title',
        'about_girls_description_1' => 'about_description_1',
        'about_girls_description_2' => 'about_description_2',
    ];

    protected $fillable = [
        'hero_dynamic',
        'about_dynamic',
        'resources_dynamic',
        'matters_dynamic',
        'faq_dynamic',
        'hero_intro',
        'hero_video_url',
        'hero_image',
        'about_title',
        'about_description_1',
        'about_description_2',
        'about_image',
        'resource_title',
        'resource_person_title',
        'resource_person_description_1',
        'resource_person_description_2',
        'resource_educator_title',
        'resource_educator_description',
        'resource_young_image',
        'resource_educator_image',
        'matters_title',
        'matters_graph1_image',
        'matters_graph1_link',
        'matters_graph1_caption',
        'matters_graph2_image',
        'matters_graph2_link',
        'matters_graph2_caption',
        'matters_graph3_image',
        'matters_graph3_link',
        'matters_graph3_caption',
        'matters_paragraph_1',
        'matters_paragraph_2',
        'faq_title',
        'locale_overrides',
    ];

    protected $casts = [
        'hero_dynamic' => 'boolean',
        'about_dynamic' => 'boolean',
        'resources_dynamic' => 'boolean',
        'matters_dynamic' => 'boolean',
        'faq_dynamic' => 'boolean',
        'locale_overrides' => 'array',
    ];

    /**
     * Button updates from Nova form; never persisted to DB.
     *
     * @var array<string, array<string, mixed>>|null
     */
    public $nonPersistedButtonUpdates;

    /**
     * Prevent relationship / virtual attributes from being persisted (e.g. from Nova form).
     * Store _button_updates only in nonPersistedButtonUpdates so it never hits the DB.
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, ['faqItems'], true)) {
            return $this;
        }
        if ($key === '_button_updates') {
            $this->nonPersistedButtonUpdates = $value;

            return $this;
        }
        if (str_starts_with($key, 'button_') || str_starts_with($key, 'locale_')) {
            return $this;
        }

        return parent::setAttribute($key, $value);
    }

    /**
     * So that $model->_button_updates reads back the non-persisted value.
     */
    public function getAttribute($key)
    {
        if ($key === '_button_updates') {
            return $this->nonPersistedButtonUpdates;
        }

        return parent::getAttribute($key);
    }

    public function buttons()
    {
        return $this->hasMany(GirlsInDigitalButton::class, 'page_id')->orderBy('position');
    }

    public function faqItems()
    {
        return $this->hasMany(GirlsInDigitalFaqItem::class, 'page_id')->orderBy('position');
    }

    /**
     * Get the singleton page config (id = 1). Create if missing.
     */
    public static function config(): self
    {
        $page = self::first();
        if ($page) {
            return $page;
        }
        return self::create(['locale_overrides' => null]);
    }

    /**
     * Content keys that have a main (default/English) column on the model.
     */
    public static function contentKeys(): array
    {
        return [
            'hero_intro',
            'about_title',
            'about_description_1',
            'about_description_2',
            'resource_title',
            'resource_person_title',
            'resource_person_description_1',
            'resource_person_description_2',
            'resource_educator_title',
            'resource_educator_description',
            'matters_title',
            'matters_graph1_caption',
            'matters_graph2_caption',
            'matters_graph3_caption',
            'matters_paragraph_1',
            'matters_paragraph_2',
            'faq_title',
        ];
    }

    /**
     * Resolve content key to DB column name.
     */
    public static function contentKeyToColumn(string $key): string
    {
        return self::$contentKeyToColumn[$key] ?? $key;
    }

    /**
     * Get content for a key in the current locale: locale override, then main (English) column, then lang file.
     */
    public function contentForLocale(string $key, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (! empty($overrides[$locale][$key])) {
            return (string) $overrides[$locale][$key];
        }
        $column = self::contentKeyToColumn($key);
        if (in_array($column, self::contentKeys(), true)) {
            $value = $this->getAttribute($column);
            if ($value !== null && $value !== '') {
                return (string) $value;
            }
        }
        return (string) __('girls-in-digital.' . $key);
    }

    /**
     * Get a button by key from the buttons relationship. Returns stdClass with label, url, open_new_tab, enabled or null.
     */
    public function getButton(string $key, ?string $locale = null): ?object
    {
        $button = $this->buttons()->where('key', $key)->first();
        if (! $button || ! $button->enabled) {
            return null;
        }
        $o = new \stdClass;
        $o->key = $button->key;
        $o->label = $button->label;
        $o->url = $button->url ?: '#';
        $o->open_new_tab = $button->open_new_tab;
        $o->enabled = true;
        return $o;
    }

    /**
     * All buttons for this page (for Nova / admin). Keys preserved from relationship.
     */
    public function getButtonsForLocale(?string $locale = null): Collection
    {
        return $this->buttons()->get()->map(fn ($b) => [
            'key' => $b->key,
            'label' => $b->label,
            'url' => $b->url,
            'open_new_tab' => $b->open_new_tab,
            'enabled' => $b->enabled,
            'position' => $b->position,
        ]);
    }

    /**
     * FAQ items for locale: returns array of ['question' => string, 'answer' => string] from faqItems relationship.
     */
    public function faqItemsForLocale(?string $locale = null): array
    {
        try {
            if (! \Illuminate\Support\Facades\Schema::hasTable('girls_in_digital_faq_items')) {
                return [];
            }
            return $this->faqItems->map(fn (GirlsInDigitalFaqItem $item) => [
                'question' => $item->questionForLocale($locale),
                'answer' => $item->answerForLocale($locale),
            ])->all();
        } catch (\Throwable $e) {
            return [];
        }
    }
}
