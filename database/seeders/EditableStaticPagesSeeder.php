<?php

namespace Database\Seeders;

use App\CsrCampaignPage;
use App\CsrCampaignResource;
use App\DancePage;
use App\OnlineCoursesPage;
use App\TreasureHuntPage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class EditableStaticPagesSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedOnlineCoursesPage();
        $this->seedCsrPage();
        $this->seedDancePage();
        $this->seedTreasureHuntPage();
    }

    private function seedOnlineCoursesPage(): void
    {
        if (!Schema::hasTable('online_courses_page')) {
            return;
        }

        OnlineCoursesPage::firstOrCreate(
            ['id' => 1],
            [
                'use_dynamic_content' => true,
                'hero_title' => 'Online Courses',
                'hero_text' => __('online-courses.online-courses-text'),
                'hero_cta_text' => 'Optional secondary CTA introduction to online courses',
                'hero_cta_link' => '/',
                'intro_title' => 'EU Code Week Online Courses',
                'intro_text_1' => __('online-courses.online-courses-sub-text1'),
                'intro_text_2' => __('online-courses.online-courses-sub-text2'),
                'intro_text_3' => __('online-courses.online-courses-sub-text3'),
            ]
        );
    }

    private function seedCsrPage(): void
    {
        if (!Schema::hasTable('csr_campaign_page')) {
            return;
        }

        $page = CsrCampaignPage::firstOrCreate(
            ['id' => 1],
            [
                'use_dynamic_content' => true,
                'hero_text' => __('csr-campaign.landing_header'),
                'primary_cta_text' => __('csr-campaign.get_involved'),
                'primary_cta_link' => 'https://codeweek.eu/blog/futurereadycsr-campaign-launch',
                'secondary_cta_text' => __('csr-campaign.explore_resources'),
                'secondary_cta_link' => 'https://codeweek.eu/blog/futurereadycsr-resources',
                'about_title' => __('csr-campaign.about_title'),
                'about_description' => __('csr-campaign.about_description'),
                'resources_title' => __('csr-campaign.resources'),
            ]
        );

        if (!Schema::hasTable('csr_campaign_resources')) {
            return;
        }

        $resources = [
            ['i' => 1, 'img' => '/images/csr/res1_explore_befefits_vertical.jpg', 'img_mobile' => '/images/csr/res1_explore_befefits_horizontal.jpg'],
            ['i' => 2, 'img' => '/images/csr/res2_first_steps_vertical.jpg', 'img_mobile' => '/images/csr/res2_first_steps_horizontal.jpg'],
            ['i' => 3, 'img' => '/images/csr/res3_pledge_badge_vertical.jpg', 'img_mobile' => '/images/csr/res3_pledge_badge_horizontal.jpg'],
            ['i' => 4, 'img' => '/images/csr/res4_csr_toolkit_vertical.jpg', 'img_mobile' => '/images/csr/res4_csr_toolkit_horizontal.jpg'],
            ['i' => 5, 'img' => '/images/csr/res5_employee_voluntering_vertical.jpg', 'img_mobile' => '/images/csr/res5_employee_voluntering_horizontal.jpg'],
            ['i' => 6, 'img' => '/images/csr/res6_mentorship_programme_vertical.jpg', 'img_mobile' => '/images/csr/res6_mentorship_programme_horizontal.jpg'],
            ['i' => 7, 'img' => '/images/csr/res7_empowering_industry_vertical.jpg', 'img_mobile' => '/images/csr/res7_empowering_industry_horizontal.jpg'],
            ['i' => 8, 'img' => '/images/csr/res8_csr_survey_vertical.jpg', 'img_mobile' => '/images/csr/res8_csr_survey_horizontal.jpg'],
            ['i' => 9, 'img' => '/images/csr/res9_faq_vertical.jpg', 'img_mobile' => '/images/csr/res9_faq_horizontal.jpg'],
            ['i' => 10, 'img' => '/images/csr/res10_happening_now_vertical.jpg', 'img_mobile' => '/images/csr/res10_happening_now_horizontal.jpg'],
        ];

        foreach ($resources as $index => $item) {
            $i = $item['i'];
            CsrCampaignResource::updateOrCreate(
                ['page_id' => $page->id, 'position' => $index],
                [
                    'title' => __("csr-campaign.resource_title_{$i}"),
                    'description' => __("csr-campaign.resource_description_{$i}"),
                    'button_text' => __("csr-campaign.resource_button_{$i}"),
                    'button_link' => __("csr-campaign.resource_link_{$i}"),
                    'image' => $item['img'],
                    'image_mobile' => $item['img_mobile'],
                    'active' => true,
                ]
            );
        }
    }

    private function seedDancePage(): void
    {
        if (!Schema::hasTable('dance_page')) {
            return;
        }

        DancePage::firstOrCreate(
            ['id' => 1],
            [
                'use_dynamic_content' => true,
                'hero_title' => __('cw2020.title.0'),
                'hero_subtitle' => __('cw2020.dance.title'),
                'content_intro_title' => __('cw2020.dance.title'),
                'content_intro_subtitle' => __('snippets.dance.subtitle'),
                'get_involved_title' => __('cw2020.get-involved.title'),
                'get_involved_subtitle' => __('cw2020.get-involved.subtitle'),
            ]
        );
    }

    private function seedTreasureHuntPage(): void
    {
        if (!Schema::hasTable('treasure_hunt_page')) {
            return;
        }

        TreasureHuntPage::firstOrCreate(
            ['id' => 1],
            [
                'use_dynamic_content' => true,
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
            ]
        );
    }
}
