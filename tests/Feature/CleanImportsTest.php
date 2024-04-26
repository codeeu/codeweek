<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Event;
use App\Helpers\ImporterHelper;
use App\Importer;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CleanImportsTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
        \App\Event::factory()->create(['id' => 1000]);
        \App\Event::factory()->count(9)->create();

        \App\Importer::factory()->count(9)->create(['website' => 'same', 'seen_at' => Carbon::now()]);
        \App\Importer::factory()->create(['website' => 'same', 'event_id' => 1000, 'seen_at' => Carbon::now()->subDays(1)]);

    }

    #[Test]
    public function event_id_should_be_set_as_to_be_deleted(): void
    {
        $this->assertEquals(1000, ImporterHelper::getDeletedEventsIDs()[0]);
    }

    #[Test]
    public function event_should_be_deleted(): void
    {

        $this->assertCount(10, Event::all());
        $this->assertCount(10, Importer::all());
        ImporterHelper::clean();
        $this->assertCount(9, Importer::all());
        $this->assertCount(9, Event::all());

    }
}
