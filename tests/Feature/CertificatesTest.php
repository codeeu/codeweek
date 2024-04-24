<?php

namespace Tests\Feature;

use App\Helpers\EventHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CertificatesTest extends TestCase
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

    /** @test */
    public function it_should_get_reported_events_without_certificate_url(): void
    {
        $faultyCertificates = \App\Event::factory()->count(10)->create(['status' => 'APPROVED', 'reported_at' => Carbon::now(), 'approved_by' => 100, 'certificate_url' => null]);
        $withCertificates = \App\Event::factory()->count(5)->create(['status' => 'APPROVED', 'reported_at' => Carbon::now(), 'approved_by' => 100, 'certificate_url' => 'foobar']);

        $events = EventHelper::getReportedEventsWithoutCertificates();

        $this->assertCount(10, $events);

    }
}
