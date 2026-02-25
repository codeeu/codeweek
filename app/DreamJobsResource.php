<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DreamJobsResource extends Model
{
    protected $table = 'dream_jobs_resources';

    protected $fillable = [
        'page_id',
        'title',
        'description',
        'button_text',
        'button_link',
        'image',
        'position',
        'active',
        'locale_overrides',
    ];

    protected $casts = [
        'position' => 'integer',
        'active' => 'boolean',
        'locale_overrides' => 'array',
    ];

    public function page()
    {
        return $this->belongsTo(DreamJobsPage::class, 'page_id');
    }

    public function titleForLocale(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (!empty($overrides[$locale]['title'])) {
            return (string) $overrides[$locale]['title'];
        }

        return (string) ($this->title ?? '');
    }

    public function descriptionForLocale(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (!empty($overrides[$locale]['description'])) {
            return (string) $overrides[$locale]['description'];
        }

        return (string) ($this->description ?? '');
    }

    public function buttonTextForLocale(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        if (!empty($overrides[$locale]['button_text'])) {
            return (string) $overrides[$locale]['button_text'];
        }

        return (string) ($this->button_text ?? '');
    }
}
