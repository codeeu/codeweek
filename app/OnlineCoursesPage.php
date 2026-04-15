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
        $defaults = [
            'use_dynamic_content' => false,
            'hero_title' => 'Online Courses',
            'hero_text' => __('online-courses.online-courses-text'),
            'hero_cta_text' => 'Optional secondary CTA introduction to online courses',
            'hero_cta_link' => '/',
            'intro_title' => 'EU Code Week Online Courses',
            'intro_text_1' => __('online-courses.online-courses-sub-text1'),
            'intro_text_2' => __('online-courses.online-courses-sub-text2'),
            'intro_text_3' => __('online-courses.online-courses-sub-text3'),
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
