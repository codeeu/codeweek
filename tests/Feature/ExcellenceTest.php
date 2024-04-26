<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Excellence;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExcellenceTest extends TestCase
{
    use DatabaseMigrations;

    private $ambassador_be;

    private $ambassador_fr;

    private $admin_be;

    private $belgium;

    private $france;

    private $italy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
    }

    #[Test]
    public function user_can_have_a_certificate_of_excellence(): void
    {
        $user = \App\User::factory()->create();

        \App\Excellence::factory()->create(['edition' => 2018, 'user_id' => $user->id]);
        \App\Excellence::factory()->create(['edition' => 2019, 'user_id' => $user->id]);
        \App\Excellence::factory()->create([
            'edition' => 2019,
            'user_id' => $user->id,
            'type' => 'SuperOrganiser',
        ]);

        $this->assertCount(2, $user->excellences);
    }

    #[Test]
    public function user_can_have_a_super_organiser_certificate(): void
    {
        $user = \App\User::factory()->create();

        \App\Excellence::factory()->create(['edition' => 2018, 'user_id' => $user->id]);
        \App\Excellence::factory()->create(['edition' => 2019, 'user_id' => $user->id]);
        \App\Excellence::factory()->create([
            'edition' => 2019,
            'user_id' => $user->id,
            'type' => 'SuperOrganiser',
        ]);

        $this->assertCount(1, $user->superOrganisers);
    }

    #[Test]
    public function should_get_all_users_with_excellence_for_specific_edition(): void
    {
        \App\Excellence::factory()->count(10)->create(['edition' => 2018]);
        \App\Excellence::factory()->count(20)->create(['edition' => 2019]);

        $filtered = Excellence::byYear(2018);

        $this->assertCount(10, $filtered);
    }

    #[Test]
    public function user_should_not_have_excellence(): void
    {
        $user = \App\User::factory()->create();

        \App\Excellence::factory()->create(['edition' => 2019, 'user_id' => $user->id]);

        $excellences = $user->excellences;

        $count = $excellences->filter(function ($value, $key) {
            return $value->edition == 2018;
        });

        $this->assertCount(0, $count);
    }

    #[Test]
    public function winner_can_report_for_Excellence(): void
    {
        $user = \App\User::factory()->create();
        \App\Excellence::factory()->create(['edition' => 2019, 'user_id' => $user->id]);

        $this->signIn($user);

        $this->get('/certificates/excellence/2019')->assertStatus(200);
    }

    #[Test]
    public function winner_can_report_for_super_organiser(): void
    {
        $user = \App\User::factory()->create();
        \App\Excellence::factory()->create([
            'edition' => 2020,
            'user_id' => $user->id,
            'type' => 'SuperOrganiser',
        ]);

        $this->signIn($user);

        $this->get('/certificates/super-organiser/2020')->assertStatus(200);
    }

    #[Test]
    public function non_winner_cant_report_for_Excellence(): void
    {
        $user = \App\User::factory()->create();

        $this->signIn($user);

        $this->get('/certificates/excellence/2019')->assertStatus(403);

        $this->post('/certificates/excellence/2019')->assertStatus(403);
    }

    #[Test]
    public function non_winner_cant_report_for_super_organiser(): void
    {
        $user = \App\User::factory()->create();

        $this->signIn($user);

        $this->get('/certificates/super-organiser/2019')->assertStatus(403);

        $this->post('/certificates/super-organiser/2019')->assertStatus(403);
    }

    #[Test]
    public function excellence_certificates_should_be_visible_on_certificates_page(): void
    {
        $user = \App\User::factory()->create();

        $this->signIn($user);
        $name = 'Tintin et Milou';

        \App\Excellence::factory()->create([
            'edition' => 2018,
            'user_id' => $user->id,
            'name_for_certificate' => $name,
        ]);

        $this->get('/certificates')->assertSee($name);
    }

    #[Test]
    public function super_organiser_certificates_should_be_visible_on_certificates_page(): void
    {
        $user = \App\User::factory()->create();

        $this->signIn($user);
        $name = 'Bob et Bobette';

        \App\Excellence::factory()->create([
            'edition' => 2020,
            'user_id' => $user->id,
            'name_for_certificate' => $name,
            'type' => 'SuperOrganiser',
        ]);

        $this->get('/certificates')
            ->assertSee('Super Organiser Certificate 2020')
            ->assertSee($name);
    }

    #[Test]
    public function excellence_certificates_should_be_visible_on_certificates_page_only_when_reported(): void
    {
        $user = \App\User::factory()->create();

        $this->signIn($user);
        $name = null;

        \App\Excellence::factory()->create([
            'edition' => 2017,
            'user_id' => $user->id,
            'name_for_certificate' => $name,
        ]);
        \App\Excellence::factory()->create([
            'edition' => 2018,
            'user_id' => $user->id,
            'name_for_certificate' => $name,
        ]);

        $this->get('/certificates')
            ->assertSee('Claim your certificate of excellence for 2017')
            ->assertSee('Claim your certificate of excellence for 2018')
            ->assertDontSee('Claim your certificate of excellence for 2020');
    }

    #[Test]
    public function super_organiser_certificates_should_be_visible_on_certificates_page_only_when_reported(): void
    {
        $user = \App\User::factory()->create();

        $this->signIn($user);
        $name = null;

        \App\Excellence::factory()->create([
            'edition' => 2020,
            'user_id' => $user->id,
            'name_for_certificate' => $name,
            'type' => 'SuperOrganiser',
        ]);

        $response = $this->get('/certificates');

        $response->assertSee('Claim your Super Organiser certificate for 2020');
    }
}
