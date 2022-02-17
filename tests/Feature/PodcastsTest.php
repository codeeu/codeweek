<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class PodcastsTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function it_should_list_active_podcasts_in_rss() {
        $this->withoutExceptionHandling();

        create('App\Podcast', ['description' => 'active description']);
        create('App\Podcast', [
            'description' => 'cannot be displayed',
            'active' => false
        ]);

        create('App\Podcast', [
            'description' => 'pending podcast',
            'active' => true,
            'release_date' => Carbon::now()->addDays(10)
        ]);

        $response = $this->get('/feed/podcasts');


        $response->assertSee('active description');
        $response->assertDontSee('cannot be displayed');
        $response->assertDontSee('pending podcast');

        $response = $this->get('/podcasts');

        $response->assertSee('active description');
        $response->assertDontSee('cannot be displayed');
        $response->assertDontSee('pending podcast');
    }
}
