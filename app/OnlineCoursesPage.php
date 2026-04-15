<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlineCoursesPage extends Model
{
    protected $table = 'online_courses_page';

    protected $fillable = [
        'use_dynamic_content',
        'hero_title',
        'hero_text',
        'hero_cta_text',
        'hero_cta_link',
        'intro_title',
        'intro_text_1',
        'intro_text_2',
        'intro_text_3',
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
            'hero_cta_link' => '/',
        ]);
    }
}
