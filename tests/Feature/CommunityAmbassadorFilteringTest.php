<?php

namespace Tests\Feature;

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
        $fr = \App\Country::factory()->create(['iso' => 'FR']);

        $bad = \App\User::factory()->create([
            'country_iso' => $fr->iso,
            'bio' => null,
            'avatar_path' => null,
        ])->assignRole('ambassador');

        $res = $this->get('/community?country_iso=FR');
        $res->assertOk();

        $res->assertViewHas('ambassadors', function ($paginator) use ($bad) {
            $collection = $paginator->getCollection();
            return !$collection->contains('id', $bad->id);
        });
    }
}

