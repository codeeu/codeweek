<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserFactoryNullFieldsTest extends TestCase
{
    use RefreshDatabase;

    public function test_factory_override_can_set_bio_and_avatar_path_null(): void
    {
        $u = User::factory()->create(['bio' => null, 'avatar_path' => null]);

        $this->assertNull($u->getRawOriginal('bio'));
        $this->assertNull($u->getRawOriginal('avatar_path'));
    }

    public function test_community_ambassador_query_excludes_null_bio_or_avatar(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $fr = \App\Country::factory()->create(['iso' => 'FR']);

        $a = User::factory()->create([
            'country_iso' => $fr->iso,
            'bio' => null,
            'avatar_path' => null,
        ])->assignRole('ambassador');

        $ambassadors = User::role('ambassador')
            ->where('country_iso', 'FR')
            ->whereRaw("bio is not null and trim(bio) <> ''")
            ->whereRaw("avatar_path is not null and trim(avatar_path) <> ''")
            ->whereNotIn('avatar_path', ['images/default-avatar.png', 'avatars/default.png'])
            ->get();

        $this->assertCount(0, $ambassadors);
        $this->assertFalse($ambassadors->contains('id', $a->id));
    }
}

