<?php

namespace Tests\Feature;

use App\Event;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class CreateEventTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function a_guest_can_not_create_event(): void
    {

        $this->withExceptionHandling();

        $this->get('/add')
            ->assertRedirect('/login');

    }

    #[Test]
    public function a_guest_user_cannot_create_events_with_post(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->withoutExceptionHandling();

        $this->expectException(AuthenticationException::class);

        $event = \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;

        $event->language = 'nl';

        $this->post('/events', $event->toArray());

    }

    #[Test]
    public function an_authenticated_user_can_create_events(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->withoutExceptionHandling();
        $this->signIn();

        $event = \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;

        $event->language = 'nl';

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $this->get($event->path())->assertSee($event->title);
        $this->get($event->path())->assertSee('tag:foo');
        $this->get($event->path())->assertSee('tag:bar');
        $this->get($event->path())->assertSee($event->codeweek_for_all_participation_code);
        $this->get($event->path())->assertSee('Dutch');
    }

    #[Test]
    public function an_authenticated_user_cannot_create_event_without_existing_audience(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->withoutExceptionHandling();
        $this->signIn();

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('The audience is invalid');

        $event = \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 33';
        $event->privacy = true;

        $event->language = 'nl';

        $this->post('/events', $event->toArray());

    }

    #[Test]
    public function an_authenticated_user_cannot_create_event_without_existing_theme(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->withoutExceptionHandling();
        $this->signIn();

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('The theme is invalid');

        $event = \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '111';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;

        $event->language = 'nl';

        $this->post('/events', $event->toArray());

    }

    #[Test]
    public function an_authenticated_user_cannot_create_event_without_existing_language(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->withoutExceptionHandling();
        $this->signIn();

        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('The selected language is invalid');

        $event = \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '111';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;

        $event->language = 'something bad';

        $this->post('/events', $event->toArray());

    }

    #[Test]
    public function address_should_be_stored_in_user_address_book(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->withoutExceptionHandling();
        $this->signIn();

        $event = \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;

        $event->language = 'nl';
        $this->assertCount(0, auth()->user()->locations);

        $this->post('/events', $event->toArray());

        $this->assertCount(1, auth()->user()->fresh()->locations);
    }

    #[Test]
    public function an_authenticated_user_can_create_events_with_existing_codeweek4all_code(): void
    {
        $this->signIn();

        $event = \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';

        $event->audience = '2, 3';

        $event->privacy = true;

        $event->codeweek_for_all_participation_code = 'my_custom_code';

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $this->get($event->path())->assertSee($event->title);

        $this->get($event->path())->assertSee('my_custom_code');
    }

    #[Test]
    public function event_should_have_a_title(): void
    {
        $this->publishEvent(['title' => null])->assertSessionHasErrors('title');

    }

    #[Test]
    public function event_should_have_a_description(): void
    {
        $this->publishEvent(['description' => null])->assertSessionHasErrors('description');

    }

    #[Test]
    public function event_should_get_valid_slug(): void
    {
        $this->withExceptionHandling();
        $this->signIn();

        $event = \App\Event::factory()->make(['title' => '-----']);
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';

        $event->audience = '2, 3';

        $event->privacy = true;

        $response = $this->post('/events', $event->toArray());

        $response->assertStatus(503);
    }

    #[Test]
    public function ambassadors_should_be_notified(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->signIn();

        Mail::fake();

        $belgium = \App\Country::factory()->create(['iso' => 'BE']);
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $ambassador_be = \App\User::factory()->create(['country_iso' => $belgium->iso])->assignRole('ambassador');

        $event = \App\Event::factory()->make();

        $event->country_iso = $belgium->iso;
        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;

        $this->post('/events', $event->toArray());

        Mail::assertQueued(\App\Mail\EventCreated::class, 1);

    }

    #[Test]
    public function event_can_be_linked_to_leading_teacher(): void
    {
        $this->seed('RolesAndPermissionsSeeder');
        $this->seed('LeadingTeacherRoleSeeder');
        $this->signIn();

        Mail::fake();

        $belgium = \App\Country::factory()->create(['iso' => 'BE']);
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $ambassador_be = \App\User::factory()->create(['country_iso' => $belgium->iso])->assignRole('ambassador');
        $leading_teacher = \App\User::factory()->create(['country_iso' => $belgium->iso, 'tag' => 'my-tag'])->assignRole('leading teacher');

        $this->assertCount(0, $leading_teacher->taggedActivities);
        $event = \App\Event::factory()->make();

        $event->country_iso = $belgium->iso;
        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;
        $event->leading_teacher_tag = 'my-tag';

        $response = $this->post('/events', $event->toArray());

        $this->assertCount(1, $leading_teacher->fresh()->taggedActivities);

    }

    #[Test]
    public function an_authenticated_user_can_create_events_without_geoposition(): void
    {
        Mail::fake();
        $this->seed('RolesAndPermissionsSeeder');
        $this->withoutExceptionHandling();
        $this->signIn();

        $event = \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo,tag:bar';
        $event->audience = '2, 3';
        $event->privacy = true;
        $event->geoposition = null;
        $event->language = 'nl';

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        $this->get($event->path())->assertSee($event->title);
        $this->get($event->path())->assertSee('tag:foo');
        $this->get($event->path())->assertSee('tag:bar');
        $this->get($event->path())->assertSee($event->codeweek_for_all_participation_code);
        $this->get($event->path())->assertSee('Dutch');
    }

    public function publishEvent($overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $event = \App\Event::factory()->make($overrides);

        return $this->post('/events', $event->toArray());

    }
}
