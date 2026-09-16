<?php

namespace Tests\Feature;

use App\Event;
use App\Helpers\ImporterHelper;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class GermanImportsTest extends TestCase
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
        // ImporterHelper::getGermanCities() is the contract. Driving the assertions
        // from it means adding or removing a city cannot silently break imported().
        $cities = ImporterHelper::getGermanCities();

        $this->assertNotEmpty($cities);

        foreach ($cities as $city) {
            $event = Event::factory()->create([
                'codeweek_for_all_participation_code' => 'cw22-'.$city,
            ]);

            $this->assertTrue($event->imported(), "cw22-{$city} should count as imported");
        }
    }
}
