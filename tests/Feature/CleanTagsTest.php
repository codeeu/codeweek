<?php

namespace Tests\Feature;

use App\Event;
use App\Helpers\TagsHelper;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class CleanTagsTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function duplicates_should_be_removed(): void
    {
        $event = \App\Event::factory()->create(['country_iso' => \App\Country::factory()->create()->iso, 'status' => 'APPROVED']);
        $event2 = \App\Event::factory()->create(['country_iso' => \App\Country::factory()->create()->iso, 'status' => 'APPROVED']);

        $single = \App\Tag::factory()->create(['name' => 'single']);

        $tag = \App\Tag::factory()->create(['name' => 'foo']);
        $tag2 = \App\Tag::factory()->create(['name' => 'foo']);
        $tag3 = \App\Tag::factory()->create(['name' => 'bar']);
        $tag4 = \App\Tag::factory()->create(['name' => 'bar']);

        $event->tags()->save($single);
        $event->tags()->save($tag);
        $event->tags()->save($tag3);

        $event2->tags()->save($tag2);
        $event2->tags()->save($tag4);

        $this->assertEquals(1, count($tag->events));
        $this->assertEquals(1, count($tag2->events));

        $this->assertNotEquals($event->tags[0]->id, $event2->tags[0]->id);

        TagsHelper::cleanTags();

        $this->assertEquals(1, count($single->fresh()->events));
        $this->assertEquals(2, count($tag->fresh()->events));
        //$this->assertEquals(0, count($tag2->fresh()->events));
        $this->assertEquals(2, count($tag3->fresh()->events));
        //$this->assertEquals(0, count($tag4->fresh()->events));

        $this->assertNull($tag2->fresh());
        $this->assertNull($tag4->fresh());

        //dump($event->fresh()->tags);
        //$this->assertEquals($event->fresh()->tags[0]->id, $event2->fresh()->tags[0]->id);

    }

    #[Test]
    public function tags_should_not_be_duplicated(): void
    {
        //$this->withoutExceptionHandling();
        $this->signIn();

        $event_A = $this->createEvent();
        $event_B = $this->createEvent();

        $this->assertEquals($event_A->tags[0]->id, $event_B->tags[0]->id);

    }

    public function createEvent()
    {
        $event = \App\Event::factory()->make();
        \App\Audience::factory()->count(3)->create();
        \App\Theme::factory()->count(3)->create();

        $event->theme = '1';
        $event->tags = 'tag:foo';
        $event->audience = '2, 3';
        $event->privacy = true;

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        return $event;
    }
}
