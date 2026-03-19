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
        'intro',
        'highlight_box',
        'video_url',
        'body_image',
        'body_image_alt',
        'content',
        'pdf_links_section',
        'contacts_section',
        'register_box_section',
        'button_text',
        'button_url',
        'secondary_button_text',
        'secondary_button_url',
        'meta_title',
        'meta_description',
        'position',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'position' => 'integer',
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
}
