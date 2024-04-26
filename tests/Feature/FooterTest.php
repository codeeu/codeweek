<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

final class FooterTest extends TestCase
{
    use DatabaseMigrations;

    private $france;

    private $ambassador_fr;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->france = \App\Country::factory()->create(['iso' => 'FR']);
        $this->ambassador_fr = \App\User::factory()->create(['country_iso' => $this->france->iso])->assignRole('ambassador');

    }

    #[Test]
    public function info_email_should_be_displayed_in_footer_only_on_ambassadors_page(): void
    {

        $this->get('/ambassadors?country_iso=FR')->assertSee('mailto:info@codeweek.eu');

    }

    #[Test]
    public function info_email_should_not_be_displayed_in_footer_on_other_pages(): void
    {

        $this->get('/')->assertDontSee('mailto:info@codeweek.eu');

    }
}
