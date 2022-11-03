<?php

namespace Tests\Feature;

use App\Helpers\EventHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CertificatesTest extends TestCase {
    use DatabaseMigrations;

    private $event;

    public function setup(): void {
        parent::setUp();
        $this->seed('RolesAndPermissionsSeeder');
        $this->event = create('App\Event', [
            'country_iso' => create('App\Country')->iso,
            'status' => 'APPROVED'
        ]);

        $this->event->audiences()->saveMany(factory('App\Audience', 3)->make());
        $this->event->themes()->saveMany(factory('App\Theme', 3)->make());
        $this->event->tags()->saveMany(factory('App\Tag', 3)->make());
    }

    /** @test */
    public function it_should_get_reported_events_without_certificate_url() {
        $faultyCertificates = create('App\Event', ['status'=>'APPROVED','reported_at' => Carbon::now(), 'approved_by' => 100, 'certificate_url' => null],10);
        $withCertificates = create('App\Event', ['status'=>'APPROVED','reported_at' => Carbon::now(), 'approved_by' => 100, 'certificate_url' => 'foobar'],5);


        $events = EventHelper::getReportedEventsWithoutCertificates();


        $this->assertCount(10, $events);

    }




}
