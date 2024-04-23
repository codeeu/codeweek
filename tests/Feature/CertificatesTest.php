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

    public function setup(): void
    {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->event = create(\App\Event::class, [
            'country_iso' => create(\App\Country::class)->iso,
            'status' => 'APPROVED',
        ]);

        $this->event->audiences()->saveMany(factory(\App\Audience::class, 3)->make());
        $this->event->themes()->saveMany(factory(\App\Theme::class, 3)->make());
        $this->event->tags()->saveMany(factory(\App\Tag::class, 3)->make());
    }

    /** @test */
    public function it_should_get_reported_events_without_certificate_url()
    {
        $faultyCertificates = create(\App\Event::class, ['status' => 'APPROVED', 'reported_at' => Carbon::now(), 'approved_by' => 100, 'certificate_url' => null], 10);
        $withCertificates = create(\App\Event::class, ['status' => 'APPROVED', 'reported_at' => Carbon::now(), 'approved_by' => 100, 'certificate_url' => 'foobar'], 5);

        $events = EventHelper::getReportedEventsWithoutCertificates();

        $this->assertCount(10, $events);

    }
}
