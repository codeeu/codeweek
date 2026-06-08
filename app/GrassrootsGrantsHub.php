<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrassrootsGrantsHub extends Model
{
    protected $table = 'grassroots_grants_hubs';

    protected $fillable = [
        'page_id',
        'title',
        'hub_status',
        'projects_funded',
        'participants_reached',
        'educators_engaged',
        'activities_on_platform',
        'overview',
        'underserved_focus',
        'status_message',
        'position',
        'active',
        'image_folder',
    ];

    protected $casts = [
        'projects_funded' => 'integer',
        'participants_reached' => 'integer',
        'educators_engaged' => 'integer',
        'activities_on_platform' => 'integer',
        'position' => 'integer',
        'active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $hub) {
            if ($hub->position === null || $hub->position === 0) {
                $pageId = $hub->page_id ?: (int) (request()->query('viaResourceId') ?? 1);
                $max = self::where('page_id', $pageId)->max('position');
                $hub->position = $max === null ? 0 : (int) $max + 1;
            }
        });
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(GrassrootsGrantsPage::class, 'page_id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(GrassrootsGrantsProject::class, 'hub_id')->orderBy('position');
    }

    public function activeProjects(): HasMany
    {
        return $this->projects()->where('active', true);
    }

    public function isStatusOnly(): bool
    {
        return in_array($this->hub_status, ['not_launched', 'cancelled'], true);
    }

    public function statusLabel(): ?string
    {
        return match ($this->hub_status) {
            'not_launched' => 'Call not launched',
            'cancelled' => 'Cancelled due to low number of applications',
            default => null,
        };
    }

    public function statusBodyHtml(): string
    {
        $message = trim(strip_tags((string) ($this->status_message ?? ''), '<p><br><strong><em><a><ul><ol><li>'));
        if ($message !== '') {
            if (str_contains((string) $this->status_message, '<')) {
                return (string) $this->status_message;
            }

            return '<p>'.e($message).'</p>';
        }

        $overview = trim((string) ($this->overview ?? ''));

        return $overview;
    }
}
