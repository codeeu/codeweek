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
     *    (English "supporting detail" block is kept when the override omits it)
     * 2. Default pdf_links_section with optional per-URL replacements
     * 3. Default pdf_links_section
     */
    public function pdfLinksSectionForLocale(?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $overrides = $this->locale_overrides ?? [];
        $localeOverrides = is_array($overrides[$locale] ?? null) ? $overrides[$locale] : [];
        $defaultSection = (string) ($this->pdf_links_section ?? '');

        if (! empty($localeOverrides['pdf_links_section']) && is_string($localeOverrides['pdf_links_section'])) {
            return $this->mergeSupportingDetailFromDefault(
                $localeOverrides['pdf_links_section'],
                $defaultSection
            );
        }

        $section = $defaultSection;
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
     * Append the default supporting-detail block when a locale override only has Key one-pagers.
     */
    protected function mergeSupportingDetailFromDefault(string $localeSection, string $defaultSection): string
    {
        if ($defaultSection === '' || $this->containsSupportingDetailSection($localeSection)) {
            return $localeSection;
        }

        $supporting = $this->extractSupportingDetailSection($defaultSection);
        if ($supporting === '') {
            return $localeSection;
        }

        return rtrim($localeSection)."\n".$supporting;
    }

    protected function containsSupportingDetailSection(string $html): bool
    {
        if (preg_match('/<(?:h2|h3|strong)\b[^>]*>\s*(?:Useful detail info|Detailed supporting information)\s*<\/(?:h2|h3|strong)>/is', $html) === 1) {
            return true;
        }

        // Heuristic: Register of Processing Activities only appears in the supporting list.
        return str_contains($html, 'Register of Processing Activities');
    }

    protected function extractSupportingDetailSection(string $html): string
    {
        if (preg_match('/((?:<div[^>]*>\s*)?<(?:h2|h3|strong)\b[^>]*>\s*(?:Useful detail info|Detailed supporting information)\s*<\/(?:h2|h3|strong)>.*)$/is', $html, $matches) === 1) {
            return trim($matches[1]);
        }

        if (preg_match_all('/<h2\b[^>]*>.*?<\/h2>/is', $html, $headings, PREG_OFFSET_CAPTURE) === false) {
            return '';
        }

        if (count($headings[0]) < 2) {
            return '';
        }

        return trim(substr($html, $headings[0][1][1]));
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

    /**
     * PDF links HTML with the locale-aware Key one-pagers note applied.
     */
    public function renderedPdfLinksSectionForLocale(?string $locale = null): string
    {
        $section = $this->pdfLinksSectionForLocale($locale);
        if ($section === '') {
            return '';
        }

        $noteHtml = '<span class="block mb-4">'.e(__('training.discover_digital_key_one_pagers_note')).'</span>';

        if (str_contains($section, '[[key_one_pagers_locale_note]]')) {
            return str_replace('[[key_one_pagers_locale_note]]', $noteHtml, $section);
        }

        // Discover Digital: inject the note even when locale overrides omit the placeholder.
        if ($this->slug !== 'discover-digital-programme') {
            return $section;
        }

        $headingPatterns = [
            '/(<h2[^>]*\bid=(["\'])key-one-pagers\2[^>]*>.*?<\/h2>)/is',
            '/(<h2[^>]*>\s*Key one-pagers\s*<\/h2>)/is',
            '/((?:<div[^>]*>\s*)?<strong>\s*Key one-pagers\s*<\/strong>(?:\s*<\/div>)?)/is',
        ];

        foreach ($headingPatterns as $pattern) {
            if (preg_match($pattern, $section) === 1) {
                return preg_replace($pattern, '$1'.$noteHtml, $section, 1) ?? $section;
            }
        }

        if (! str_contains(mb_strtolower($section), 'key one-pagers')) {
            return '<h2 id="key-one-pagers">Key one-pagers</h2>'.$noteHtml.$section;
        }

        return $noteHtml.$section;
    }
}
