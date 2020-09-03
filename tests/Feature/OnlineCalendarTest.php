<?php
//
//namespace Tests\Feature;
//
//use App\Helpers\EventHelper;
//use Carbon\Carbon;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
//use Tests\TestCase;
//
//class OnlineCalendarTest extends TestCase
//{
//
//    use DatabaseMigrations;
//
//    /** @test */
//    public function it_should_get_upcoming_online_events()
//    {
//        //Good ones
//        create('App\Event', ['activity_type' => "open-online", "status"=>"APPROVED",'start_date'=>Carbon::now()]);
//        create('App\Event', ['activity_type' => "open-online", "status"=>"APPROVED",'start_date'=>Carbon::now()->addDays(10)]);
//
//        //Bad ones
//        create('App\Event', ['activity_type' => "open-online", "status"=>"APPROVED",'start_date'=>Carbon::now()->subDays(10)]);
//        create('App\Event', ['activity_type' => "open-closed", "status"=>"APPROVED"]);
//        create('App\Event', ['activity_type' => "open-online", "status"=>"PENDING"]);
//        create('App\Event', ['activity_type' => "open-offline", "status"=>"APPROVED"]);
//
//        $events = EventHelper::getOnlineEvents();
//        $this->assertCount(2, $events);
//    }
//}
