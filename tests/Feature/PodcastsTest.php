<?php

namespace Tests\Feature;

use App\PodcastGuest;
use App\PodcastResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class PodcastsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_list_active_podcasts_in_rss()
    {
//        $this->withoutExceptionHandling();

        create('App\Podcast', ['description' => 'active description', 'active' => true, 'release_date' => Carbon::now()->subDay()]);
        create('App\Podcast', [
            'description' => 'cannot be displayed',
            'active' => false
        ]);

        create('App\Podcast', [
            'description' => 'pending podcast',
            'active' => true,
            'release_date' => Carbon::now()->addDays(10)
        ]);

        $response = $this->get('feed/podcasts');

        $response->assertSee('active description');
        $response->assertDontSee('cannot be displayed');
        $response->assertDontSee('pending podcast');

    }

    /** @test */
    public function it_should_list_active_podcasts_in_html()
    {
        create('App\Podcast', ['title' => 'active title', 'active' => true, 'release_date' => Carbon::now()->subHour()]);
        create('App\Podcast', [
            'title' => 'cannot be displayed',
            'active' => false
        ]);

        create('App\Podcast', [
            'title' => 'pending title',
            'active' => true,
            'release_date' => Carbon::now()->addHour()
        ]);



        $response = $this->get('/podcasts');

        $response->assertSee('active title');
        $response->assertDontSee('cannot be displayed');
        $response->assertDontSee('pending title');
    }

    /** @test */
    public function podcast_can_have_guests()
    {
        $podcast = create('App\Podcast');

        $podcastGuest = PodcastGuest::factory()->count(3)->for($podcast)->create();
        $otherPodcastGuests = PodcastResource::factory()->count(10)->create();

        $this->assertCount(3, $podcast->guests()->get());

    }

    /** @test */
    public function podcast_should_list_guests()
    {

        $podcast = create('App\Podcast');

        $podcastGuest = PodcastGuest::factory()->for($podcast)->create();

        $response = $this->get('/podcast/' . $podcast->id);

        $response->assertSee($podcastGuest->name);

    }

    /** @test */
    public function podcast_should_list_resources()
    {

        $podcast = create('App\Podcast');

        $podcastResource = PodcastResource::factory()->for($podcast)->create();

        $response = $this->get('/podcast/' . $podcast->id);

        $response->assertSee($podcastResource->name);
        $response->assertSee($podcastResource->url);

    }

    /** @test */
    public function podcast_can_have_resources()
    {
        $this->withoutExceptionHandling();

        $podcast = create('App\Podcast');
        $podcastResource = PodcastResource::factory()->count(3)->for($podcast)->create();
        $otherPodcastResource = PodcastResource::factory()->count(6)->create();


        $this->assertCount(3, $podcast->resources()->get());


    }


}
