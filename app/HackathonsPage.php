<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HackathonsPage extends Model
{
    protected $table = 'hackathons_page';

    protected $fillable = [
        'dynamic_content',
        'hero_title',
        'hero_subtitle',
        'intro_title',
        'intro_paragraph_1',
        'intro_paragraph_2',
        'details_title',
        'details_paragraph_1',
        'details_paragraph_2',
        'details_paragraph_3',
        'details_paragraph_4',
        'video_url',
        'extra_button_text',
        'extra_button_link',
        'recap_button_text',
        'recap_button_link',
        'toolkit_button_text',
        'toolkit_button_link',
        'locale_overrides',
    ];

    protected $casts = [
        'dynamic_content' => 'boolean',
        'locale_overrides' => 'array',
    ];

    public static function config(): self
    {
        $page = self::first();
        if ($page) {
            return $page;
        }

        return self::create([
            'dynamic_content' => false,
            'locale_overrides' => null,
        ]);
    }

    public function contentForLocale(string $key, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (!empty($overrides[$locale][$key])) {
            return (string) $overrides[$locale][$key];
        }

        $value = $this->getAttribute($key);
        return $value !== null ? (string) $value : '';
    }
}
