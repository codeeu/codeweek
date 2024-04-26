<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class ParticipationTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function anonymous_users_cant_create_participation_certificate(): void
    {

        $this->get(route('participation'))->assertRedirect('/login');

    }

    #[Test]
    public function user_can_have_a_certificate_of_participation(): void
    {

        $user = \App\User::factory()->create();

        \App\Participation::factory()->create(['user_id' => $user->id]);
        \App\Participation::factory()->create(['user_id' => $user->id]);

        $this->assertCount(2, $user->participations);

    }

    #[Test]
    public function user_should_be_allowed_to_download_certificate(): void
    {

        $user = \App\User::factory()->create();
        $this->signIn($user);

        $participation = \App\Participation::factory()->create(['user_id' => $user->id]);

        $this->get(route('certificates'))->assertSee($participation->participation_url);

    }

    #[Test]
    public function user_should_only_see_their_certificates(): void
    {

        $user = \App\User::factory()->create();
        $this->signIn($user);

        $participation = \App\Participation::factory()->create();
        $myParticipation = \App\Participation::factory()->create(['user_id' => $user->id]);

        $this->get(route('certificates'))->assertSee($myParticipation->participation_url);
        $this->get(route('certificates'))->assertDontSee($participation->participation_url);

    }
}
