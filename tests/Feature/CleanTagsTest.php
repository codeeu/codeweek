<?php

namespace Tests\Feature;

use App\Event;
use App\Helpers\TagsHelper;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CleanTagsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function duplicates_should_be_removed(): void
    {
        $event = create(\App\Event::class, ['country_iso' => create(\App\Country::class)->iso, 'status' => 'APPROVED']);
        $event2 = create(\App\Event::class, ['country_iso' => create(\App\Country::class)->iso, 'status' => 'APPROVED']);

        $single = create(\App\Tag::class, ['name' => 'single']);

        $tag = create(\App\Tag::class, ['name' => 'foo']);
        $tag2 = create(\App\Tag::class, ['name' => 'foo']);
        $tag3 = create(\App\Tag::class, ['name' => 'bar']);
        $tag4 = create(\App\Tag::class, ['name' => 'bar']);

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

    /** @test */
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
        $event = make(\App\Event::class);
        create(\App\Audience::class, [], 3);
        create(\App\Theme::class, [], 3);

        $event->theme = '1';
        $event->tags = 'tag:foo';
        $event->audience = '2, 3';
        $event->privacy = true;

        $this->post('/events', $event->toArray());

        $event = Event::where('title', $event->title)->first();

        return $event;
    }
}
