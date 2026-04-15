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
        $defaults = [
            'use_dynamic_content' => false,
            'intro_heading' => 'How to get involved',
            'intro_text' => 'It’s easy to take part in Code Week. If you’re an educator, student, parent or community leader you can make a big impact. You can host your own activity, join one nearby, explore learning resources, or connect with others across Europe.',
            'intro_button_text' => 'Get involved',
            'intro_button_link' => '/guide',
            'movement_heading' => 'Join the movement for digital creativity',
            'movement_text_1' => 'The beauty of Code Week is that there’s no single way to take part. Whether you run an event or join one, you\'re helping grow a movement built on creativity, inclusion and digital skills.',
            'movement_text_2' => 'Spread the joy of coding, connect with like-minded people, and empower others to shape their digital future. Every action makes a difference.',
            'start_heading' => 'How to get started with Code Week',
            'start_text' => "Whether you’re curious about coding, passionate about teaching, or just want to try something new, there’s a place for you in EU Code Week.\n\nYou don’t need to be an expert. From hosting events to sharing resources, there are plenty of ways to contribute to this fun, open and collaborative movement.",
            'card_community_title' => 'Connect with your local Code Week community',
            'card_community_text' => 'Find educators, mentors and organisers near you through the Code Week map or national hubs. There’s a whole network ready to support and collaborate.',
            'card_activity_title' => 'Register your Code Week activity',
            'card_activity_text' => 'Planning something? Add it to the Code Week map so others can see it.',
            'card_ambassadors_title' => 'Connect with EU Code Week Ambassadors',
            'card_ambassadors_text' => 'Ambassadors help coordinate Code Week in their countries. Reach out for support, advice or to join local projects and challenges.',
            'card_stories_title' => 'Share your coding experience and stories',
            'card_stories_text' => 'Post photos, videos and stories using #EUCodeWeek. Highlight what you’ve learned, celebrate your community, and inspire others to join',
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
