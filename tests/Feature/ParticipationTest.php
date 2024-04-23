<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function anonymous_users_cant_create_participation_certificate(): void
    {

        $this->get(route('participation'))->assertRedirect('/login');

    }

    /** @test */
    public function user_can_have_a_certificate_of_participation(): void
    {

        $user = create(\App\User::class);

        create(\App\Participation::class, ['user_id' => $user->id]);
        create(\App\Participation::class, ['user_id' => $user->id]);

        $this->assertCount(2, $user->participations);

    }

    /** @test */
    public function user_should_be_allowed_to_download_certificate(): void
    {

        $user = create(\App\User::class);
        $this->signIn($user);

        $participation = create(\App\Participation::class, ['user_id' => $user->id]);

        $this->get(route('certificates'))->assertSee($participation->participation_url);

    }

    /** @test */
    public function user_should_only_see_their_certificates(): void
    {

        $user = create(\App\User::class);
        $this->signIn($user);

        $participation = create(\App\Participation::class);
        $myParticipation = create(\App\Participation::class, ['user_id' => $user->id]);

        $this->get(route('certificates'))->assertSee($myParticipation->participation_url);
        $this->get(route('certificates'))->assertDontSee($participation->participation_url);

    }
}
