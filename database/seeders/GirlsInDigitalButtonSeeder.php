<?php

namespace Database\Seeders;

use App\GirlsInDigitalButton;
use App\GirlsInDigitalPage;
use Illuminate\Database\Seeder;

class GirlsInDigitalButtonSeeder extends Seeder
{
    /**
     * Seed the Girls in Digital page with default buttons in the buttons table.
     * Safe to run multiple times (upserts by page_id + key).
     */
    public function run(): void
    {
        $page = GirlsInDigitalPage::first();
        if (! $page) {
            return;
        }

        $defaults = [
            ['key' => 'gcib_sprint_hero', 'label' => 'Girls Code It Better Sprint', 'url' => 'https://codeweek.eu/blog/girls-in-digital-week-2026/', 'open_new_tab' => false, 'position' => 0],
            ['key' => 'female_role_models', 'label' => 'Female Role Models Database', 'url' => 'https://codeweek.ecwt.eu/', 'open_new_tab' => true, 'position' => 1],
            ['key' => 'open_call_challenges', 'label' => 'Open Call for GiD Challenges', 'url' => '/docs/girls-in-digital/open-call-for-new-code-week-challenges_v2.pdf', 'open_new_tab' => true, 'position' => 2],
            ['key' => 'search_activity', 'label' => 'Search an activity', 'url' => '/events', 'open_new_tab' => false, 'position' => 3],
            ['key' => 'meet_role_model', 'label' => 'Meet a Role Model', 'url' => 'https://codeweek.ecwt.eu/role-models/', 'open_new_tab' => true, 'position' => 4],
            ['key' => 'organise_gcib_sprint', 'label' => 'Organise a GCIB Sprint', 'url' => 'https://codeweek-resources.s3.eu-west-1.amazonaws.com/GCIB-Sprint-materials.zip', 'open_new_tab' => false, 'position' => 5],
            ['key' => 'activity_guideline', 'label' => 'Girls in Digital Activity Guideline', 'url' => '/docs/girls-in-digital/girls-in-digital-activity-guidelines.pdf', 'open_new_tab' => true, 'position' => 6],
            ['key' => 'social_media_kit', 'label' => 'Social Media Kit', 'url' => '/docs/girls-in-digital/girls-in-digital-media-kit.pdf', 'open_new_tab' => true, 'position' => 7],
        ];

        foreach ($defaults as $d) {
            GirlsInDigitalButton::updateOrCreate(
                ['page_id' => $page->id, 'key' => $d['key']],
                [
                    'label' => $d['label'],
                    'url' => $d['url'],
                    'open_new_tab' => $d['open_new_tab'],
                    'enabled' => true,
                    'position' => $d['position'],
                ]
            );
        }

        $this->command->info('Girls in Digital page buttons updated. Edit in Nova under Content → Girls in Digital.');
    }
}
