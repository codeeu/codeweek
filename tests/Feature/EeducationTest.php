<?php

namespace Tests\Feature;

use App\Importer;
use App\Imports\RemoteImporter;
use App\ResourceCategory;
use App\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EeducationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_create_event_from_eeducation()
    {

        // Setup World

        $input[] = (object) array(
            "id"=> "1111",
            "organizer_email"=> "reinhard.grass@bhak-bludenz.ac.at",
            "activity_title"=> "Programmierkurs der FH-Vorarlberg f\u00fcr die Sch\u00fclerInnen der Vorarlberger Handelsakademien (Kooperationsprojekt mit der FH-Vorarlberg im Rahmen der Digitalisierungsstrategie des Vorarlberger Handelsakademien)",
            "activity_description"=> "Die Vorarlberger Handelsakademien wollen die Herausforderungen und Chancen der Digitalisierung gemeinsam bew\u00e4ltigen und nutzen. Dazu wurde ein interdisziplin\u00e4res Projektteam ins Lebens gerufen, um schul\u00fcbergreifende Workshops und Veranstaltungen durchzuf\u00fchren.\r\n\r\nAm Mo\/Di\/Mi, 1.\/2.\/3. Juli 2019 fand nun der erste Workshop \u2013 ein Programmierkurs  f\u00fcr Java Script und Python -  gemeinsam mit und an der FH-Vorarlberg statt. 48 Jugendliche aus allen HAKs Vorarlberg von der 2. bis zur 4.Klassen nahmen begeistert daran teil. Als Termin wurde die letzte Schulwoche gew\u00e4hlt, als Abschluss wurde von der FH ein Zertifikat ausgestellt.",
            "school_name"=> "BHAK Bludenz",
            "organisation_type"=> "school",
            "activity_type"=> "online_and_open",
            "address"=> "Schillerstra\u00dfe 10, 6700 Bludenz",
            "country"=> "AT",
            "starttime"=> 1561932000,
            "endtime"=> 1562018340,
            "tstamp"=> "1564514814",
            "url"=> "",
            "lat"=> "47.15237",
            "lng"=> "9.82636"
        );
        $input[] = (object) array(
            "id"=> "2222",
            "organizer_email"=> "reinhard.grass@bhak-bludenz.ac.at",
            "activity_title"=> "Programmierkurs der FH-Vorarlberg f\u00fcr die Sch\u00fclerInnen der Vorarlberger Handelsakademien (Kooperationsprojekt mit der FH-Vorarlberg im Rahmen der Digitalisierungsstrategie des Vorarlberger Handelsakademien)",
            "activity_description"=> "Die Vorarlberger Handelsakademien wollen die Herausforderungen und Chancen der Digitalisierung gemeinsam bew\u00e4ltigen und nutzen. Dazu wurde ein interdisziplin\u00e4res Projektteam ins Lebens gerufen, um schul\u00fcbergreifende Workshops und Veranstaltungen durchzuf\u00fchren.\r\n\r\nAm Mo\/Di\/Mi, 1.\/2.\/3. Juli 2019 fand nun der erste Workshop \u2013 ein Programmierkurs  f\u00fcr Java Script und Python -  gemeinsam mit und an der FH-Vorarlberg statt. 48 Jugendliche aus allen HAKs Vorarlberg von der 2. bis zur 4.Klassen nahmen begeistert daran teil. Als Termin wurde die letzte Schulwoche gew\u00e4hlt, als Abschluss wurde von der FH ein Zertifikat ausgestellt.",
            "school_name"=> "BHAK Bludenz",
            "organisation_type"=> "school",
            "activity_type"=> "online_and_open",
            "address"=> "Schillerstra\u00dfe 10, 6700 Bludenz",
            "country"=> "AT",
            "starttime"=> 1561932000,
            "endtime"=> 1562018340,
            "tstamp"=> "1564514814",
            "url"=> "",
            "lat"=> "47.15237",
            "lng"=> "9.82636"
        );


        //When we process it
        $ri = new RemoteImporter("Eeducation", $input, 1);
        $ri->import();

        //Test an event has been created
        $this->assertEquals(2, sizeof(Event::all()));

        //Test a record is linked into importers table for eeducation
        $this->assertEquals(2, sizeof(Importer::where("website","=","Eeducation")->get()));


    }
}
