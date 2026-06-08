<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrassrootsGrantsProjectLink extends Model
{
    protected $table = 'grassroots_grants_project_links';

    protected $fillable = [
        'project_id',
        'label',
        'url',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $link) {
            if ($link->position === null || $link->position === 0) {
                $projectId = $link->project_id ?: (int) (request()->query('viaResourceId') ?? 0);
                $max = self::where('project_id', $projectId)->max('position');
                $link->position = $max === null ? 0 : (int) $max + 1;
            }
        });
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(GrassrootsGrantsProject::class, 'project_id');
    }
}
