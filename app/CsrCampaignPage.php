<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsrCampaignPage extends Model
{
    protected $table = 'csr_campaign_page';

    protected $fillable = [
        'use_dynamic_content',
        'hero_text',
        'primary_cta_text',
        'primary_cta_link',
        'secondary_cta_text',
        'secondary_cta_link',
        'about_title',
        'about_description',
        'resources_title',
    ];

    protected $casts = [
        'use_dynamic_content' => 'boolean',
    ];

    public function resources()
    {
        return $this->hasMany(CsrCampaignResource::class, 'page_id')->orderBy('position');
    }

    public static function config(): self
    {
        $page = self::first();
        if ($page) {
            return $page;
        }

        return self::create([
            'use_dynamic_content' => false,
            'primary_cta_link' => 'https://codeweek.eu/blog/futurereadycsr-campaign-launch',
            'secondary_cta_link' => 'https://codeweek.eu/blog/futurereadycsr-resources',
        ]);
    }
}
