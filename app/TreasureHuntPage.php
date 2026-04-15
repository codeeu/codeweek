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
            'hero_title' => 'Treasure Hunt',
            'hero_subtitle' => 'Simple yet challenging Telegram game – easy for beginners, engaging for experienced players.',
            'intro_title' => 'Code Week Treasure Hunt',
            'intro_paragraph_1' => 'This is a game on Telegram that is simple enough for beginners, but also challenging to keep experienced participants on their toes.',
            'intro_paragraph_2' => 'The Code Week Treasure Hunt is a game best played on your PC with a mobile phone in hand. The game will ask you to solve coding challenges and guide you through the history of coding, computer science and technology in Europe.',
            'how_to_play_title' => 'How to play',
            'step_1_text' => 'Download the Telegram app. It is available for Desktop (Windows, macOS and Linux), iOS and Android You can play the game either on your PC or laptop, or on your smartphone. We recommend you play it on your computer so that you can get the instructions and solve the coding challenges on the Telegram app on your phone.',
            'step_2_text' => 'To play the game, open the game and scan the QR code that will take you to the Telegram app and give you the first set of instructions.',
            'step_3_text' => 'To win, you need to solve 10 coding challenges and find 10 locations on the map of Europe that are linked to the rise of coding and technology.',
            'step_4_text' => 'After you complete the game, share your score with your friends using #EUCodeWeek and challenge them to play and learn about the history of coding too. Let\'s see who scores the top results!',
            'info_text' => 'The Code Week Treasure Hunt is the virtual version of the original EU Code Week Treasure Hunt which was first developed by Alessandro Bogliolo, Professor of Computer Systems at the University of Urbino. To learn more about his original game, visit our blog.',
            'get_involved_title' => 'How to get involved',
            'get_involved_text' => 'Can’t wait to start coding? If you would like to join the EU Code Week community but don\'t know where to start, take a look at these resources that will help get you started, just in time for our annual celebration in October.',
            'get_involved_link_1' => 'https://blog.codeweek.eu/getting-started-with-eu-code-week/',
            'get_involved_link_2' => '/guide',
            'get_involved_link_3' => '/training',
            'get_involved_link_4' => 'https://bit.ly/DEEPDIVE2020',
            'get_involved_link_5' => '/resources/CodingAtHome',
        ]);
    }
}
