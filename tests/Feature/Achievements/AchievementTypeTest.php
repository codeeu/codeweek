<?php

namespace Tests\Feature\Achievements\Achievements;

use PHPUnit\Framework\Attributes\Test;
use App\Achievements\Types\AchievementType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AchievementTypeTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_sets_a_default_name(): void
    {
        $type = new FakeAchievementType();

        $this->assertEquals('Fake Achievement Type', $type->name());

    }
}

class FakeAchievementType extends AchievementType
{
    public $icon = 'icon.svg';

    public $edition = 2022;

    public function description()
    {
        return 'Some fake description';
    }

    public function qualifier($user)
    {
        return true;
    }
}
