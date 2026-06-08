<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrassrootsGrantsProject extends Model
{
    protected $table = 'grassroots_grants_projects';

    protected $fillable = [
        'hub_id',
        'title',
        'organisation',
        'location',
        'participants',
        'educators',
        'activities',
        'description',
        'underserved_focus',
        'position',
        'active',
        'image_folder',
    ];

    protected $casts = [
        'position' => 'integer',
        'active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $project) {
            if ($project->position === null || $project->position === 0) {
                $hubId = $project->hub_id ?: (int) (request()->query('viaResourceId') ?? 0);
                $max = self::where('hub_id', $hubId)->max('position');
                $project->position = $max === null ? 0 : (int) $max + 1;
            }
        });
    }

    public function hub(): BelongsTo
    {
        return $this->belongsTo(GrassrootsGrantsHub::class, 'hub_id');
    }

    public function links(): HasMany
    {
        return $this->hasMany(GrassrootsGrantsProjectLink::class, 'project_id')->orderBy('position');
    }

    public function images(): HasMany
    {
        return $this->hasMany(GrassrootsGrantsProjectImage::class, 'project_id')->orderBy('position');
    }
}
