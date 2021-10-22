<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PodcastsTest extends TestCase {
    use RefreshDatabase;

    /** @test */
    public function it_should_list_active_podcasts() {
        $this->withoutExceptionHandling();

        create('App\Podcast', ['description' => 'active description']);
        create('App\Podcast', [
            'description' => 'cannot be displayed',
            'active' => false
        ]);

        $response = $this->get('/podcasts');

        $response->assertSeeText('active description');
        $response->assertDontSeeText('cannot be displayed');
    }
}
