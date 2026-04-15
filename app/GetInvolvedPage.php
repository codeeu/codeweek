<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GetInvolvedPage extends Model
{
    protected $table = 'get_involved_page';

    protected $fillable = [
        'use_dynamic_content',
        'intro_heading',
        'intro_text',
        'intro_button_text',
        'intro_button_link',
        'movement_heading',
        'movement_text_1',
        'movement_text_2',
        'start_heading',
        'start_text',
        'card_community_title',
        'card_community_text',
        'card_community_link',
        'card_community_new_tab',
        'card_activity_title',
        'card_activity_text',
        'card_activity_link',
        'card_activity_new_tab',
        'card_ambassadors_title',
        'card_ambassadors_text',
        'card_ambassadors_link',
        'card_ambassadors_new_tab',
        'card_stories_title',
        'card_stories_text',
        'card_stories_link',
        'card_stories_new_tab',
    ];

    protected $casts = [
        'use_dynamic_content' => 'boolean',
        'card_community_new_tab' => 'boolean',
        'card_activity_new_tab' => 'boolean',
        'card_ambassadors_new_tab' => 'boolean',
        'card_stories_new_tab' => 'boolean',
    ];

    public static function config(): self
    {
        $page = self::first();
        if ($page) {
            return $page;
        }

        return self::create([
            'use_dynamic_content' => false,
            'intro_button_link' => '/guide',
        ]);
    }
}
