<?php

namespace Tests\Feature;

use App\Event;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class PurgeSecurityProbeEventsTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function it_soft_deletes_probe_events_and_users(): void
    {
        $probeUser = User::factory()->create(['email' => 'cwtester@cwprobe.invalid']);
        $realUser = User::factory()->create(['email' => 'teacher@school.be']);

        $probeEvent = Event::factory()->create([
            'title' => 'CW Probe Event 123',
            'user_email' => 'cwtester@cwprobe.invalid',
            'description' => 'Benign test activity for authorized security testing.',
            'status' => 'PENDING',
            'creator_id' => $probeUser->id,
        ]);

        $gmailProbeUser = User::factory()->create(['email' => 'cwprobe.intake154639@gmail.com']);
        $gmailProbeEvent = Event::factory()->create([
            'title' => 'CW Defaults Check',
            'user_email' => 'cwprobe.intake154639@gmail.com',
            'description' => 'Benign.',
            'status' => 'PENDING',
            'creator_id' => $gmailProbeUser->id,
        ]);

        $realEvent = Event::factory()->create([
            'title' => 'Real Belgium coding club',
            'user_email' => 'teacher@school.be',
            'description' => 'A real workshop for students.',
            'status' => 'PENDING',
            'creator_id' => $realUser->id,
        ]);

        $this->artisan('events:purge-security-probes', ['--delete' => true, '--users' => true])
            ->assertSuccessful();

        $this->assertSoftDeleted($probeEvent);
        $this->assertSoftDeleted($gmailProbeEvent);
        $this->assertDatabaseHas('events', ['id' => $realEvent->id, 'deleted_at' => null]);
        $this->assertSoftDeleted($probeUser);
        $this->assertSoftDeleted($gmailProbeUser);
        $this->assertDatabaseHas('users', ['id' => $realUser->id, 'deleted_at' => null]);
    }
}
