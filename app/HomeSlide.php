<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{
    protected $fillable = [
        'title_translations',
        'description_translations',
        'url',
        'button_text_translations',
        'open_primary_new_tab',
        'url2',
        'button2_text_translations',
        'open_second_new_tab',
        'image',
        'position',
        'active',
        'show_countdown',
        'countdown_target',
    ];

    protected $casts = [
        'title_translations' => 'array',
        'description_translations' => 'array',
        'button_text_translations' => 'array',
        'button2_text_translations' => 'array',
        'active' => 'boolean',
        'show_countdown' => 'boolean',
        'countdown_target' => 'datetime',
        'position' => 'integer',
        'open_primary_new_tab' => 'boolean',
        'open_second_new_tab' => 'boolean',
    ];

    /**
     * Get translated string for a key (title_translations, description_translations, etc.).
     * Uses current app locale with fallback to 'en' then first available.
     */
    public function getTranslation(string $key, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $translations = $this->getAttribute($key);
        if (! is_array($translations)) {
            return '';
        }
        $value = $translations[$locale] ?? $translations['en'] ?? null;
        if ($value !== null && $value !== '') {
            return (string) $value;
        }
        return (string) (array_values($translations)[0] ?? '');
    }

    /** For Nova index/detail: show title in current locale. */
    public function getTitleAttribute(): string
    {
        return $this->getTranslation('title_translations');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('position')->orderBy('id');
    }

    /**
     * Full URL for image. Use asset() for paths so images in public/ resolve correctly.
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }
        $value = trim($this->image);
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }
        return asset(ltrim($value, '/'));
    }
}
