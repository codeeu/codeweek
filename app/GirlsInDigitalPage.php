<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class GirlsInDigitalPage extends Model
{
    protected $table = 'girls_in_digital_page';

    protected $fillable = [
        'use_dynamic_content',
        'hero_intro',
        'hero_video_url',
        'about_title',
        'about_description_1',
        'about_description_2',
        'resource_title',
        'resource_person_title',
        'resource_person_description_1',
        'resource_person_description_2',
        'resource_educator_title',
        'resource_educator_description',
        'buttons',
        'locale_overrides',
    ];

    protected $casts = [
        'use_dynamic_content' => 'boolean',
        'buttons' => 'array',
        'locale_overrides' => 'array',
    ];

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
        ];
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
        if (in_array($key, self::contentKeys(), true)) {
            $value = $this->getAttribute($key);
            if ($value !== null && $value !== '') {
                return (string) $value;
            }
        }
        return (string) __('girls-in-digital.' . $key);
    }

    /**
     * Get a button by key. Returns stdClass with label, url, open_new_tab, enabled or null.
     */
    public function getButton(string $key, ?string $locale = null): ?object
    {
        $buttons = $this->getButtonsForLocale($locale);
        $btn = $buttons->firstWhere('key', $key);
        if (! $btn || empty($btn['enabled'])) {
            return null;
        }
        $o = new \stdClass;
        $o->key = $btn['key'];
        $o->label = $btn['label'] ?? '';
        $o->url = $btn['url'] ?? '#';
        $o->open_new_tab = ! empty($btn['open_new_tab']);
        $o->enabled = true;
        return $o;
    }

    /**
     * Buttons for locale: merge locale_overrides[locale].buttons onto main buttons.
     */
    public function getButtonsForLocale(?string $locale = null): Collection
    {
        $locale = $locale ?? app()->getLocale();
        $main = collect($this->buttons ?? []);
        $overrides = $this->locale_overrides ?? [];
        $localeButtons = $overrides[$locale]['buttons'] ?? null;
        if (! is_array($localeButtons)) {
            return $main;
        }
        $byKey = $main->keyBy('key');
        foreach ($localeButtons as $b) {
            $k = $b['key'] ?? null;
            if ($k !== null) {
                $byKey->put($k, array_merge($byKey->get($k) ?? [], $b));
            }
        }
        return $byKey->values()->sortBy('position')->values();
    }
}
