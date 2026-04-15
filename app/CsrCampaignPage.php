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
        $defaults = [
            'use_dynamic_content' => false,
            'hero_text' => __('csr-campaign.landing_header'),
            'primary_cta_text' => __('csr-campaign.get_involved'),
            'primary_cta_link' => 'https://codeweek.eu/blog/futurereadycsr-campaign-launch',
            'secondary_cta_text' => __('csr-campaign.explore_resources'),
            'secondary_cta_link' => 'https://codeweek.eu/blog/futurereadycsr-resources',
            'about_title' => __('csr-campaign.about_title'),
            'about_description' => __('csr-campaign.about_description'),
            'resources_title' => __('csr-campaign.resources'),
        ];

        $page = self::first();
        if ($page) {
            $dirty = false;
            foreach ($defaults as $key => $value) {
                if ($page->{$key} === null || $page->{$key} === '') {
                    $page->{$key} = $value;
                    $dirty = true;
                }
            }
            if ($dirty) {
                $page->save();
            }
            return $page;
        }

        return self::create($defaults);
    }
}
