<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DreamJobsPage extends Model
{
    protected $table = 'dream_jobs_page';

    protected $fillable = [
        'hero_dynamic',
        'about_dynamic',
        'role_models_dynamic',
        'resources_dynamic',
        'hero_intro',
        'hero_cta_text',
        'hero_cta_link',
        'about_title',
        'about_description',
        'about_video_url',
        'role_models_title',
        'resources_title',
        'locale_overrides',
    ];

    protected $casts = [
        'hero_dynamic' => 'boolean',
        'about_dynamic' => 'boolean',
        'role_models_dynamic' => 'boolean',
        'resources_dynamic' => 'boolean',
        'locale_overrides' => 'array',
    ];

    public function resources()
    {
        return $this->hasMany(DreamJobsResource::class, 'page_id')->orderBy('position');
    }

    public static function config(): self
    {
        $page = self::first();
        if ($page) {
            return $page;
        }

        return self::create([
            'hero_dynamic' => false,
            'about_dynamic' => false,
            'role_models_dynamic' => false,
            'resources_dynamic' => false,
            'hero_cta_link' => '#dream-job-resources',
            'about_video_url' => 'https://www.youtube.com/embed/pzP-kToeym4?si=FzutCQGW4rO5M_5A',
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

    public function resourcesForLocale(?string $locale = null): array
    {
        return $this->resources()
            ->where('active', true)
            ->orderBy('position')
            ->get()
            ->map(fn (DreamJobsResource $item) => [
                'title' => $item->titleForLocale($locale),
                'description' => $item->descriptionForLocale($locale),
                'button_text' => $item->buttonTextForLocale($locale),
                'button_link' => $item->button_link,
                'image' => $item->image,
            ])
            ->all();
    }
}
