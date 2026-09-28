<?php

namespace Tests\Feature;

use App\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class GenerateRecurringEventsTest extends TestCase
{
    use RefreshDatabase;

    private function makeWeeklyParent(): Event
    {
        return Event::factory()->create([
            'status' => 'APPROVED',
            'title' => 'Weekly Coding Club',
            'recurring_event' => 'weekly',
            'start_date' => Carbon::now()->subWeeks(4)->startOfDay()->setTime(9, 0),
            'end_date' => Carbon::now()->addMonths(2)->endOfDay(),
            'source_ref' => null,
        ]);
    }

    #[Test]
    public function it_writes_a_dated_source_ref_so_later_occurrences_can_coexist(): void
    {
        $parent = $this->makeWeeklyParent();

        Artisan::call('events:generate-recurring');

        $child = Event::query()
            ->where('source_ref', 'like', 'parent:'.$parent->id.':%')
            ->first();

        $this->assertNotNull($child);
        $this->assertMatchesRegularExpression(
            '/^parent:'.$parent->id.':\d{4}-\d{2}-\d{2}$/',
            $child->source_ref
        );
    }

    #[Test]
    public function it_rekeys_a_legacy_parent_ref_and_creates_the_next_occurrence(): void
    {
        $parent = $this->makeWeeklyParent();

        // The unique index on source_ref meant the first implementation could only
        // ever store one child, keyed as the bare "parent:{id}".
        $legacyStart = Carbon::now()->subWeeks(3)->startOfDay()->setTime(9, 0);
        $legacy = Event::factory()->create([
            'status' => 'APPROVED',
            'title' => 'Weekly Coding Club (legacy child)',
            'recurring_event' => 'weekly',
            'start_date' => $legacyStart,
            'end_date' => $legacyStart->copy()->addHours(2),
            'source_ref' => 'parent:'.$parent->id,
        ]);

        Artisan::call('events:generate-recurring');

        $legacy->refresh();
        $this->assertSame(
            'parent:'.$parent->id.':'.$legacyStart->toDateString(),
            $legacy->source_ref,
            'The legacy row must be rewritten so it no longer blocks the unique index.'
        );

        $children = Event::query()
            ->where('source_ref', 'like', 'parent:'.$parent->id.':%')
            ->orderBy('start_date')
            ->get();

        $this->assertGreaterThanOrEqual(2, $children->count());
        $this->assertTrue(
            $children->contains(fn (Event $event) => $event->id === $legacy->id)
        );
    }

    #[Test]
    public function running_twice_does_not_duplicate_the_same_occurrence(): void
    {
        $parent = $this->makeWeeklyParent();

        Artisan::call('events:generate-recurring');
        Artisan::call('events:generate-recurring');

        $this->assertSame(
            1,
            Event::query()->where('source_ref', 'like', 'parent:'.$parent->id.':%')->count()
        );
    }
}
