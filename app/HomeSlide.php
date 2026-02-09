<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'button_text',
        'open_primary_new_tab',
        'url2',
        'button2_text',
        'open_second_new_tab',
        'image',
        'position',
        'active',
        'show_countdown',
        'countdown_target',
        'locale_overrides',
    ];

    protected $casts = [
        'locale_overrides' => 'array',
        'active' => 'boolean',
        'show_countdown' => 'boolean',
        'countdown_target' => 'datetime',
        'position' => 'integer',
        'open_primary_new_tab' => 'boolean',
        'open_second_new_tab' => 'boolean',
    ];

    /**
     * Display value for current locale: use optional override or translate via lang key (default English).
     */
    public function titleForLocale(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (! empty($overrides[$locale]['title'])) {
            return (string) $overrides[$locale]['title'];
        }
        return (string) __($this->title ?? '');
    }

    public function descriptionForLocale(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (! empty($overrides[$locale]['description'])) {
            return (string) $overrides[$locale]['description'];
        }
        return (string) __($this->description ?? '');
    }

    public function buttonTextForLocale(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (! empty($overrides[$locale]['button_text'])) {
            return (string) $overrides[$locale]['button_text'];
        }
        return (string) __($this->button_text ?? '');
    }

    public function button2TextForLocale(?string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (isset($overrides[$locale]['button2_text'])) {
            return $overrides[$locale]['button2_text'] === '' ? null : (string) $overrides[$locale]['button2_text'];
        }
        $val = $this->button2_text;
        return $val === null || $val === '' ? null : (string) __($val);
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
