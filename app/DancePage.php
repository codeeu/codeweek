<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DancePage extends Model
{
    protected $table = 'dance_page';

    protected $fillable = [
        'use_dynamic_content',
        'hero_title',
        'hero_subtitle',
        'content_intro_title',
        'content_intro_subtitle',
        'get_involved_title',
        'get_involved_subtitle',
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
        ]);
    }
}
