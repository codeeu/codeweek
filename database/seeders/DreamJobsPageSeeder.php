<?php

namespace Database\Seeders;

use App\DreamJobsPage;
use App\DreamJobsResource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DreamJobsPageSeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('dream_jobs_page') || !Schema::hasTable('dream_jobs_resources')) {
            return;
        }

        $page = DreamJobsPage::firstOrCreate(
            ['id' => 1],
            [
                'hero_dynamic' => false,
                'about_dynamic' => false,
                'role_models_dynamic' => false,
                'resources_dynamic' => false,
                'hero_intro' => __('dream-jobs-in-digital.landing_header'),
                'hero_cta_text' => __('dream-jobs-in-digital.get_involved'),
                'hero_cta_link' => '#dream-job-resources',
                'about_title' => __('dream-jobs-in-digital.about_title'),
                'about_description' => __('dream-jobs-in-digital.about_description'),
                'about_video_url' => 'https://www.youtube.com/embed/pzP-kToeym4?si=FzutCQGW4rO5M_5A',
                'role_models_title' => __('dream-jobs-in-digital.our_role_models'),
                'resources_title' => __('dream-jobs-in-digital.resources'),
            ]
        );

        $defaults = [
            [
                'title' => __('dream-jobs-in-digital.resource_title_1'),
                'description' => __('dream-jobs-in-digital.resource_description_1'),
                'button_text' => __('dream-jobs-in-digital.resource_button_1'),
                'button_link' => '/docs/dream-jobs/C4E WP4 Careers in Digital Guide Toolkit.pdf',
                'image' => '/images/dream-jobs/career-guide.png',
            ],
            [
                'title' => __('dream-jobs-in-digital.resource_title_2'),
                'description' => __('dream-jobs-in-digital.resource_description_2'),
                'button_text' => __('dream-jobs-in-digital.resource_button_2'),
                'button_link' => '/docs/dream-jobs/C4E WP4 Career Day Toolkit.pdf',
                'image' => '/images/dream-jobs/inspiration-day.png',
            ],
            [
                'title' => __('dream-jobs-in-digital.resource_title_3'),
                'description' => __('dream-jobs-in-digital.resource_description_3'),
                'button_text' => __('dream-jobs-in-digital.resource_button_3'),
                'button_link' => '/docs/dream-jobs/Practical Skills – VET Toolkit.pdf',
                'image' => '/images/dream-jobs/vet-activities.png',
            ],
            [
                'title' => __('dream-jobs-in-digital.resource_title_4'),
                'description' => __('dream-jobs-in-digital.resource_description_4'),
                'button_text' => __('dream-jobs-in-digital.resource_button_4'),
                'button_link' => 'https://www.techskills.org/careers/quiz/',
                'image' => '/images/dream-jobs/skills-test.png',
            ],
        ];

        foreach ($defaults as $index => $row) {
            DreamJobsResource::updateOrCreate(
                ['page_id' => $page->id, 'button_link' => $row['button_link']],
                [
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'button_text' => $row['button_text'],
                    'image' => $row['image'],
                    'position' => $index,
                    'active' => true,
                ]
            );
        }
    }
}
