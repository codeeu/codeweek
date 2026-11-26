<?php

namespace Tests\Feature;

use App\City;
use App\Country;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CommunityAmbassadorFilteringTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function community_view_does_not_include_ambassador_without_bio_or_avatar(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');
        $fr = Country::factory()->create(['iso' => 'FR']);

        $bad = User::factory()->create([
            'country_iso' => $fr->iso,
            'bio' => null,
            'avatar_path' => null,
        ])->assignRole('ambassador');

        $res = $this->get('/community?country_iso=FR');
        $res->assertOk();

        $res->assertViewHas('ambassadors', function ($paginator) use ($bad) {
            $collection = $paginator->getCollection();

            return ! $collection->contains('id', $bad->id);
        });
    }

    #[Test]
    public function community_leading_teachers_are_filtered_by_selected_country(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');

        $lt = Country::factory()->create(['iso' => 'LT']);
        $fr = Country::factory()->create(['iso' => 'FR']);
        $vilnius = City::factory()->create([
            'country_iso' => 'LT',
            'city' => 'Vilnius',
            'latitude' => 54.6833,
            'longitude' => 25.2833,
        ]);

        $lithuanian = User::factory()->create([
            'country_iso' => $lt->iso,
            'city_id' => $vilnius->id,
            'approved' => 1,
            'firstname' => 'Dovile',
            'lastname' => 'Testiene',
            'avatar_path' => null,
        ])->assignRole('leading teacher');

        $french = User::factory()->create([
            'country_iso' => $fr->iso,
            'approved' => 1,
            'firstname' => 'Marie',
            'lastname' => 'Dupont',
        ])->assignRole('leading teacher');

        $res = $this->get('/community?country_iso=LT');
        $res->assertOk();

        $res->assertViewHas('teachers', function ($teachers) use ($lithuanian, $french) {
            return $teachers->contains('id', $lithuanian->id)
                && ! $teachers->contains('id', $french->id);
        });

        $res->assertSee('Dovile', false);
        $res->assertDontSee('Marie', false);
        // The teacher payload is emitted through @json, which escapes forward slashes.
        $res->assertSee(str_replace('/', '\/', asset('images/default.png')), false);
    }
}
