<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GermanImports extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function it_should_not_be_listed_as_imported(): void
    {

        $event = \App\Event::factory()->create(['codeweek_for_all_participation_code' => 'random']);

        $this->assertFalse($event->imported());

    }

    #[Test]
    public function it_should_be_listed_as_imported(): void
    {
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-hamburg'])->imported());
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-baden'])->imported());
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-bonn'])->imported());
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-berlin'])->imported());
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-leipzig'])->imported());
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-dresden'])->imported());
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-thueringen'])->imported());
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-bremen'])->imported());
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-muensterland'])->imported());
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-nordhessen'])->imported());
        $this->assertTrue(Event::factory()->create(['codeweek_for_all_participation_code' => 'cw22-bayern'])->imported());

    }
}
