<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TrainingResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'card_title',
        'card_author',
        'card_image',
        'page_title',
        'hero_author',
        'hero_button_text',
        'hero_button_url',
        'hero_secondary_button_text',
        'hero_secondary_button_url',
        'intro',
        'highlight_box',
        'video_url',
        'video_script_url',
        'video_script_text',
        'body_image',
        'body_image_alt',
        'content',
        'pdf_links_section',
        'locale_overrides',
        'contacts_section',
        'register_box_section',
        'about_box_section',
        'anchor_offset',
        'roadmap_pdf_embed_url',
        'roadmap_embed_kind',
        'roadmap_svg',
        'roadmap_image_url',
        'roadmap_image_link_url',
        'button_text',
        'button_url',
        'secondary_button_text',
        'secondary_button_url',
        'third_button_text',
        'third_button_url',
        'meta_title',
        'meta_description',
        'position',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'position' => 'integer',
        'anchor_offset' => 'integer',
        'locale_overrides' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('position')->orderBy('created_at', 'desc');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::saving(function (self $resource) {
            if (blank($resource->slug)) {
                $baseSlug = Str::slug($resource->card_title ?: $resource->page_title ?: 'training-resource');
                $resource->slug = $resource->generateUniqueSlug($baseSlug ?: 'training-resource');
            }

            if (blank($resource->card_title)) {
                $resource->card_title = $resource->page_title ?: Str::headline($resource->slug);
            }

            if (blank($resource->page_title)) {
                $resource->page_title = $resource->card_title;
            }
        });
    }

    protected function generateUniqueSlug(string $baseSlug): string
    {
        $slug = $baseSlug;
        $counter = 1;

        while (self::query()
            ->where('slug', $slug)
            ->when($this->exists, fn ($query) => $query->where('id', '!=', $this->id))
            ->exists()) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    public function getResolvedCardImageAttribute(): string
    {
        $image = trim((string) $this->card_image);

        if ($image === '') {
            return '/img/learning/cody-color-kit.png';
        }

        // Allow absolute URLs (including Amazon S3/CloudFront), protocol-relative, or root-relative paths.
        if (Str::startsWith($image, ['http://', 'https://', '//', '/'])) {
            return $image;
        }

        // Backward-compatible shorthand: treat plain filenames as /img/learning/{filename}.
        return '/img/learning/'.$image;
    }

    public function getResolvedBodyImageAttribute(): ?string
    {
        $image = trim((string) $this->body_image);

        if ($image === '') {
            return null;
        }

        if (Str::startsWith($image, ['http://', 'https://', '//', '/'])) {
            return $image;
        }

        return '/img/learning/'.$image;
    }

    public function getYoutubeVideoIdAttribute(): ?string
    {
        $url = trim((string) $this->video_url);
        if ($url === '') {
            return null;
        }

        $patterns = [
            '/youtu\.be\/([a-zA-Z0-9_-]{11})/i',
            '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]{11})/i',
            '/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/i',
            '/youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches) === 1) {
                return $matches[1];
            }
        }

        return null;
    }

    /**
     * Resolve PDF links HTML for the active (or given) locale.
     *
     * Priority:
     * 1. Full locale override of pdf_links_section, if present
     * 2. Default pdf_links_section with optional per-URL replacements
     * 3. Default pdf_links_section
     */
    public function pdfLinksSectionForLocale(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        $localeOverrides = is_array($overrides[$locale] ?? null) ? $overrides[$locale] : [];

        if (! empty($localeOverrides['pdf_links_section']) && is_string($localeOverrides['pdf_links_section'])) {
            return $localeOverrides['pdf_links_section'];
        }

        $section = (string) ($this->pdf_links_section ?? '');
        $replacements = $localeOverrides['pdf_link_replacements'] ?? null;

        if (! is_array($replacements) || $replacements === [] || $section === '') {
            return $section;
        }

        foreach ($replacements as $from => $to) {
            if (! is_string($from) || ! is_string($to) || $from === '' || $to === '') {
                continue;
            }

            $section = str_replace($from, $to, $section);
        }

        return $section;
    }

    /**
     * Whether the given locale has dedicated PDF-link content (full section or URL map).
     */
    public function hasPdfLinksOverrideForLocale(?string $locale = null): bool
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        $localeOverrides = is_array($overrides[$locale] ?? null) ? $overrides[$locale] : [];

        if (! empty($localeOverrides['pdf_links_section']) && is_string($localeOverrides['pdf_links_section'])) {
            return true;
        }

        $replacements = $localeOverrides['pdf_link_replacements'] ?? null;

        return is_array($replacements) && $replacements !== [];
    }
}
