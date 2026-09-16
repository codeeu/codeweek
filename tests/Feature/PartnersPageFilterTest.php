<?php

namespace Tests\Feature;

use App\Livewire\PartnerContentComponent;
use App\Livewire\PartnerFilterComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class PartnersPageFilterTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function partners_page_renders_livewire_outside_the_vue_app_root(): void
    {
        $html = $this->get(route('sponsors'))->assertOk()->getContent();

        $appPos = strpos($html, 'id="app"');
        $nonVuePos = strpos($html, 'id="non-vue"');
        $sponsorsPos = strpos($html, 'id="codeweek-sponsors-page"');

        $this->assertNotFalse($appPos);
        $this->assertNotFalse($nonVuePos);
        $this->assertNotFalse($sponsorsPos);

        // Vue mounts on #app and re-renders its DOM, which strips Livewire wire: bindings.
        // Partner tabs must live in #non-vue so filter clicks keep working.
        $this->assertGreaterThan(
            $nonVuePos,
            $sponsorsPos,
            'Partners page must render in #non-vue, not #app'
        );
    }

    #[Test]
    public function selecting_a_filter_updates_partner_content(): void
    {
        Livewire::test(PartnerFilterComponent::class)
            ->call('selectFilter', 'Council Presidency')
            ->assertSet('selectedFilter', 'Council Presidency')
            ->assertDispatched('filterChanged', filter: 'Council Presidency');

        Livewire::test(PartnerContentComponent::class)
            ->dispatch('filterChanged', filter: 'Council Presidency')
            ->assertSet('filter', 'Council Presidency')
            ->assertSee('Council President');

        Livewire::test(PartnerContentComponent::class)
            ->dispatch('filterChanged', filter: 'EU Code Week Supporters')
            ->assertSet('filter', 'EU Code Week Supporters');
    }
}
