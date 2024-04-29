<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class ReviewEventTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
    }

    #[Test]
    public function ambassadors_of_right_country_can_see_the_review_section(): void
    {
        $ambassador = \App\User::factory()->create(['country_iso' => 'FR'])->assignRole('ambassador');
        $this->signIn($ambassador);

        $event = \App\Event::factory()->count(33)->create(['country_iso' => 'FR', 'status' => 'PENDING']);

        $this->get('/view/'.$event[30]->id.'/random')
            ->assertSee('moderate-event');

    }

    #[Test]
    public function visitors_cant_see_the_review_section(): void
    {
        $visitor = \App\User::factory()->create(['country_iso' => 'FR']);
        $this->signIn($visitor);

        $event = \App\Event::factory()->create(['country_iso' => 'FR', 'status' => 'PENDING']);

        $this->get('/view/'.$event->id.'/random')
            ->assertDontSee('moderate-event');

    }
}
