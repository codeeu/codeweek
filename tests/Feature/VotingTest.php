<?php
//
//namespace Tests\Feature;
//
//use App\Event;
//use App\Vote;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Http\Response;
//use Tests\TestCase;
//
//class VotingTest extends TestCase
//{
//
//    use DatabaseMigrations;
//
//    /** @test */
//    public function should_cast_vote()
//    {
//        //$this->withExceptionHandling();
//        $this->withoutExceptionHandling();
//
//
//        $this->assertEmpty(Vote::where("country","ireland")->get());
//
//        $request = [
//            "country" => "ireland",
//            "choice" => "choice one"
//        ];
//
//        $this->post(route('hackathon-vote', $request));
//
//        $this->assertNotEmpty(Vote::where("country","ireland")->get());
//
//    }
//}
