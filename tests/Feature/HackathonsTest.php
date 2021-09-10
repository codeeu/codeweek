<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HackathonsTest extends TestCase {
    /** @test */
    public function hackathons_should_be_accessible() {
        $response = $this->get('/hackathons');
        $response->assertStatus(200);
    }

    /** @test */
    public function hackathon_greece_should_be_accessible() {
        $response = $this->get('/hackathons/greece');
        $response->assertStatus(200);
    }

    /** @test */
    public function hackathon_latvia_should_be_accessible() {
        $response = $this->get('/hackathons/latvia');
        $response->assertStatus(200);
    }

    /** @test */
    public function hackathon_slovenia_should_be_accessible() {
        $response = $this->get('/hackathons/slovenia');
        $response->assertStatus(200);
    }

    /** @test */
    public function hackathon_ireland_should_be_accessible() {
        $response = $this->get('/hackathons/ireland');
        $response->assertStatus(200);
    }

    /** @test */
    public function hackathon_italy_should_be_accessible() {
        $response = $this->get('/hackathons/italy');
        $response->assertStatus(200);
    }

    /** @test */
    public function hackathon_romania_should_be_accessible() {
        $response = $this->get('/hackathons/romania');
        $response->assertStatus(200);
    }
}
