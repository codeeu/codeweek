<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Achievements\Achievement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AchievementModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_name()
    {
        $achievement = create(Achievement::class, ['name' => 'some badge']);

        self::assertEquals('some badge', $achievement->name);
    }

    /** @test */
    public function it_has_a_description()
    {
        $achievement = create(Achievement::class, ['description' => 'Foobar']);

        self::assertEquals('Foobar', $achievement->description);
    }

    /** @test */
    public function it_has_an_icon()
    {
        $achievement = create(Achievement::class, ['icon' => 'some-path.svg']);

        self::assertEquals('some-path.svg', $achievement->icon);
    }
}
