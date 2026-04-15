<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreasureHuntPage extends Model
{
    protected $table = 'treasure_hunt_page';

    protected $fillable = [
        'use_dynamic_content',
        'hero_title',
        'hero_subtitle',
        'intro_title',
        'intro_paragraph_1',
        'intro_paragraph_2',
        'how_to_play_title',
        'step_1_text',
        'step_2_text',
        'step_3_text',
        'step_4_text',
        'info_text',
        'get_involved_title',
        'get_involved_text',
        'get_involved_link_1',
        'get_involved_link_2',
        'get_involved_link_3',
        'get_involved_link_4',
        'get_involved_link_5',
    ];

    protected $casts = [
        'use_dynamic_content' => 'boolean',
    ];

    public static function config(): self
    {
        $page = self::first();
        if ($page) {
            return $page;
        }

        return self::create([
            'use_dynamic_content' => false,
            'get_involved_link_1' => 'https://blog.codeweek.eu/getting-started-with-eu-code-week/',
            'get_involved_link_2' => '/guide',
            'get_involved_link_3' => '/training',
            'get_involved_link_4' => 'https://bit.ly/DEEPDIVE2020',
            'get_involved_link_5' => '/resources/CodingAtHome',
        ]);
    }
}
