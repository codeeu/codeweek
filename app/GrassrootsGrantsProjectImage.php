<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrassrootsGrantsProjectImage extends Model
{
    protected $table = 'grassroots_grants_project_images';

    protected $fillable = [
        'project_id',
        'url',
        'alt',
        'file_type',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $image) {
            if ($image->position === null || $image->position === 0) {
                $projectId = $image->project_id ?: (int) (request()->query('viaResourceId') ?? 0);
                $max = self::where('project_id', $projectId)->max('position');
                $image->position = $max === null ? 0 : (int) $max + 1;
            }
        });
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(GrassrootsGrantsProject::class, 'project_id');
    }

    public function resolvedUrl(): string
    {
        $url = trim((string) $this->url);
        if ($url === '') {
            return '';
        }

        if (str_starts_with($url, 'http://') || str_starts_with($url, 'https://') || str_starts_with($url, '//')) {
            return $url;
        }

        $path = str_starts_with($url, '/') ? $url : '/'.$url;
        $segments = explode('/', $path);
        $encoded = array_map(static function (string $segment): string {
            return rawurlencode(rawurldecode($segment));
        }, $segments);

        return implode('/', $encoded);
    }

    public function isPdf(): bool
    {
        return $this->file_type === 'pdf' || str_ends_with(strtolower($this->url), '.pdf');
    }
}
