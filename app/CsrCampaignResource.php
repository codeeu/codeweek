<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsrCampaignResource extends Model
{
    protected $table = 'csr_campaign_resources';

    protected $fillable = [
        'page_id',
        'title',
        'description',
        'button_text',
        'button_link',
        'image',
        'image_mobile',
        'position',
        'active',
    ];

    protected $casts = [
        'position' => 'integer',
        'active' => 'boolean',
    ];
}
