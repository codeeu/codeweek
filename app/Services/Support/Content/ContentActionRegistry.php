<?php

namespace App\Services\Support\Content;

/**
 * Allowlist of content models the support AI may edit. Editable fields are NOT
 * listed here — they are resolved dynamically (string/text columns minus the
 * structural deny-list) by ContentFieldResolver, so this stays a thin registry
 * of "which records" rather than "which columns".
 *
 * - singleton: page-style tables with a single config row (looked up via the
 *   model's config()/first() — no identifier needed).
 * - lookup_fields: unique string columns the AI may reference instead of an id.
 */
class ContentActionRegistry
{
    /**
     * @return array<string, array{model: class-string, label: string, singleton: bool, lookup_fields: list<string>}>
     */
    public function all(): array
    {
        return [
            'static_page' => ['model' => \App\StaticPage::class, 'label' => 'Static page', 'singleton' => false, 'lookup_fields' => ['unique_identifier', 'path']],
            'home_slide' => ['model' => \App\HomeSlide::class, 'label' => 'Homepage slide', 'singleton' => false, 'lookup_fields' => []],
            'get_involved_page' => ['model' => \App\GetInvolvedPage::class, 'label' => 'Get Involved page', 'singleton' => true, 'lookup_fields' => []],
            'hackathons_page' => ['model' => \App\HackathonsPage::class, 'label' => 'Hackathons page', 'singleton' => true, 'lookup_fields' => []],
            'dance_page' => ['model' => \App\DancePage::class, 'label' => 'Dance page', 'singleton' => true, 'lookup_fields' => []],
            'treasure_hunt_page' => ['model' => \App\TreasureHuntPage::class, 'label' => 'Treasure Hunt page', 'singleton' => true, 'lookup_fields' => []],
            'online_courses_page' => ['model' => \App\OnlineCoursesPage::class, 'label' => 'Online Courses page', 'singleton' => true, 'lookup_fields' => []],
            'girls_in_digital_page' => ['model' => \App\GirlsInDigitalPage::class, 'label' => 'Girls in Digital page', 'singleton' => true, 'lookup_fields' => []],
            'girls_in_digital_faq_item' => ['model' => \App\GirlsInDigitalFaqItem::class, 'label' => 'Girls in Digital FAQ item', 'singleton' => false, 'lookup_fields' => []],
            'dream_jobs_page' => ['model' => \App\DreamJobsPage::class, 'label' => 'Dream Jobs page', 'singleton' => true, 'lookup_fields' => []],
            'csr_campaign_page' => ['model' => \App\CsrCampaignPage::class, 'label' => 'CSR Campaign page', 'singleton' => true, 'lookup_fields' => []],
            'grassroots_grants_page' => ['model' => \App\GrassrootsGrantsPage::class, 'label' => 'Grassroots Grants page', 'singleton' => true, 'lookup_fields' => []],
            'grassroots_grants_hub' => ['model' => \App\GrassrootsGrantsHub::class, 'label' => 'Grassroots Grants hub', 'singleton' => true, 'lookup_fields' => []],
            'menu_section' => ['model' => \App\Models\MenuSection::class, 'label' => 'Menu section', 'singleton' => false, 'lookup_fields' => []],
            'menu_item' => ['model' => \App\Models\MenuItem::class, 'label' => 'Menu item', 'singleton' => false, 'lookup_fields' => []],
            'event' => ['model' => \App\Event::class, 'label' => 'Event', 'singleton' => false, 'lookup_fields' => []],
            'podcast' => ['model' => \App\Podcast::class, 'label' => 'Podcast', 'singleton' => false, 'lookup_fields' => []],
            'online_course' => ['model' => \App\OnlineCourse::class, 'label' => 'Online course', 'singleton' => false, 'lookup_fields' => []],
            'partner' => ['model' => \App\Partner::class, 'label' => 'Partner', 'singleton' => false, 'lookup_fields' => []],
        ];
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->all());
    }

    /**
     * @return array{model: class-string, label: string, singleton: bool, lookup_fields: list<string>}|null
     */
    public function get(string $key): ?array
    {
        return $this->all()[$key] ?? null;
    }

    /**
     * @return list<string>
     */
    public function keys(): array
    {
        return array_keys($this->all());
    }
}
