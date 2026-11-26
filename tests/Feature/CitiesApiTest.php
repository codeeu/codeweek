<?php

namespace Tests\Feature;

use App\City;
use App\Country;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class CitiesApiTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function it_lists_cities_for_a_country_including_albania(): void
    {
        Country::factory()->create(['iso' => 'AL', 'name' => 'Albania']);
        Country::factory()->create(['iso' => 'BE', 'name' => 'Belgium']);

        $tirana = City::factory()->create([
            'city' => 'Tirana',
            'country_iso' => 'AL',
        ]);
        City::factory()->create([
            'city' => 'Brussels',
            'country_iso' => 'BE',
        ]);

        $this->getJson('/api/cities?country_iso=AL')
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonFragment([
                'id' => $tirana->id,
                'city' => 'Tirana',
                'country_iso' => 'AL',
            ]);
    }

    #[Test]
    public function profile_preloads_cities_for_the_users_country_even_outside_hub_list(): void
    {
        $this->seed('RolesAndPermissionsSeeder');

        Country::factory()->create(['iso' => 'AL', 'name' => 'Albania']);
        $tirana = City::factory()->create([
            'city' => 'Tirana',
            'country_iso' => 'AL',
        ]);

        $user = User::factory()->create([
            'country_iso' => 'AL',
            'city_id' => null,
            'email_verified_at' => now(),
        ]);

        $this->signIn($user);

        $this->get('/profile')
            ->assertOk()
            ->assertSee('Tirana', false)
            ->assertSee((string) $tirana->id, false)
            ->assertSee('/api/cities', false);
    }

    #[Test]
    public function cities_api_requires_country_iso(): void
    {
        $this->getJson('/api/cities')
            ->assertStatus(422);
    }
}
