<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

final class EventsTest extends TestCase
{
    use DatabaseMigrations;

    private $event;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->event = \App\Event::factory()->create([
            'country_iso' => \App\Country::factory()->create()->iso,
            'status' => 'APPROVED',
        ]);

        $this->event->audiences()->saveMany(\App\Audience::factory()->count(3)->make());
        $this->event->themes()->saveMany(\App\Theme::factory()->count(3)->make());
        $this->event->tags()->saveMany(\App\Tag::factory()->count(3)->make());
    }

    #[Test]
    public function a_user_can_browse_approved_events(): void
    {
        $this->get('/view/'.$this->event->id.'/random')->assertSee(
            $this->event->title
        );
    }

    #[Test]
    public function a_user_cant_browse_non_approved_events(): void
    {
        $this->event->update(['status' => 'REJECTED']);
        $this->get('/view/'.$this->event->id.'/random')->assertStatus(403);
    }

    #[Test]
    public function a_user_should_be_redirected_on_pending_activities(): void
    {
        $this->event->update(['status' => 'PENDING']);
        $response = $this->get(
            '/view/'.$this->event->id.'/random'
        )->assertRedirect('login');
    }

    #[Test]
    public function an_event_has_an_organizer(): void
    {
        $this->get('/view/'.$this->event->id.'/random')->assertSee(
            $this->event->organizer
        );
    }

    #[Test]
    public function a_user_can_see_audiences_associated_with_events(): void
    {
        foreach ($this->event->audiences()->get() as &$value) {
            $this->get('/view/'.$this->event->id.'/random')->assertSee(
                $value->name
            );
        }
    }

    #[Test]
    public function a_user_can_see_themes_associated_with_events(): void
    {
        foreach ($this->event->themes()->get() as &$value) {
            $this->get('/view/'.$this->event->id.'/random')->assertSee(
                $value->name
            );
        }
    }

    #[Test]
    public function a_user_can_see_tags_associated_with_events(): void
    {
        foreach ($this->event->tags()->get() as &$value) {
            $this->get('/view/'.$this->event->id.'/random')->assertSee(
                $value->name
            );
        }
    }

    #[Test]
    public function visitors_cant_see_the_user_email(): void
    {
        $event = \App\Event::factory()->create([
            'user_email' => 'foo@bar.com',
            'country_iso' => \App\Country::factory()->create()->iso,
            'status' => 'APPROVED',
        ]);

        $this->get('/view/'.$event->id.'/random')->assertDontSee(
            'foo@bar.com'
        );
    }

    #[Test]
    public function ambassadors_from_other_countries_cant_see_the_user_email(): void
    {
        $ambassador = \App\User::factory()->create(['country_iso' => 'FR'])->assignRole(
            'ambassador'
        );
        $this->signIn($ambassador);

        $event = \App\Event::factory()->create([
            'user_email' => 'foo@bar.com',
            'country_iso' => 'BE',
            'status' => 'APPROVED',
        ]);

        $this->get('/view/'.$event->id.'/random')->assertDontSee(
            'foo@bar.com'
        );
    }

    #[Test]
    public function ambassadors_from_same_country_can_see_the_user_email(): void
    {
        $ambassador = \App\User::factory()->create(['country_iso' => 'FR'])->assignRole(
            'ambassador'
        );
        $this->signIn($ambassador);

        $event = \App\Event::factory()->create([
            'user_email' => 'foo@bar.com',
            'country_iso' => 'FR',
            'status' => 'APPROVED',
        ]);

        $this->get('/view/'.$event->id.'/random')->assertSee('foo@bar.com');
    }

    #[Test]
    public function admins_can_see_the_user_email(): void
    {
        $admin = \App\User::factory()->create()->assignRole('super admin');
        $this->signIn($admin);

        $event = \App\Event::factory()->create([
            'user_email' => 'foo@bar.com',
            'status' => 'APPROVED',
        ]);

        $this->get('/view/'.$event->id.'/random')->assertSee('foo@bar.com');
    }

    #[Test]
    public function user_see_detail_picture_if_available(): void
    {
        $event = \App\Event::factory()->create([
            'picture_detail' => 'foobar.png',
            'status' => 'APPROVED',
        ]);

        $this->get('/view/'.$event->id.'/random')->assertSee('foobar.png');
    }

    #[Test]
    public function user_see_normal_picture_if_detail_is_not_available(): void
    {
        $event = \App\Event::factory()->create([
            'picture' => 'normal.png',
            'status' => 'APPROVED',
        ]);

        $this->get('/view/'.$event->id.'/random')->assertSee('normal.png');
    }
}
