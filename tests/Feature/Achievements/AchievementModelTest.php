<?php

namespace Tests\Feature\Achievements\Achievements;

use App\Achievements\Achievement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class AchievementModelTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_has_a_name(): void
    {
        $achievement = create(Achievement::class, ['name' => 'some badge']);

        self::assertEquals('some badge', $achievement->name);
    }

    #[Test]
    public function it_has_a_description(): void
    {
        $achievement = create(Achievement::class, ['description' => 'Foobar']);

        self::assertEquals('Foobar', $achievement->description);
    }

    #[Test]
    public function it_has_an_icon(): void
    {
        $achievement = create(Achievement::class, ['icon' => 'some-path.svg']);

        self::assertEquals('some-path.svg', $achievement->icon);
    }
}
