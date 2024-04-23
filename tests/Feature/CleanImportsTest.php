<?php

namespace Tests\Feature;

use App\Event;
use App\Helpers\ImporterHelper;
use App\Importer;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CleanImportsTest extends TestCase
{
    use DatabaseMigrations;

    public function setup(): void
    {
        parent::setUp();
        create(\App\Event::class, ['id' => 1000]);
        create(\App\Event::class, [], 9);

        create(\App\Importer::class, ['website' => 'same', 'seen_at' => Carbon::now()], 9);
        create(\App\Importer::class, ['website' => 'same', 'event_id' => 1000, 'seen_at' => Carbon::now()->subDays(1)], 1);

    }

    /** @test */
    public function event_id_should_be_set_as_to_be_deleted()
    {
        $this->assertEquals(1000, ImporterHelper::getDeletedEventsIDs()[0]);
    }

    /** @test */
    public function event_should_be_deleted()
    {

        $this->assertCount(10, Event::all());
        $this->assertCount(10, Importer::all());
        ImporterHelper::clean();
        $this->assertCount(9, Importer::all());
        $this->assertCount(9, Event::all());

    }
}
