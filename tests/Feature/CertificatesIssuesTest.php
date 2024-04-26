<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use App\Mail\WarningEmail;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CertificatesIssuesTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function warning_email_should_be_sent_as_certificates_are_not_generated(): void
    {
        Mail::fake();

        \App\Participation::factory()->create(['participation_url' => null, 'created_at' => Carbon::now()->subDay()]);

        $this->artisan('certificate:issues');

        Mail::assertQueued(WarningEmail::class);

    }

    #[Test]
    public function no_warning_email_should_be_sent_as_there_are_no_errors(): void
    {
        Mail::fake();

        \App\Participation::factory()->create(['participation_url' => 'url//', 'created_at' => Carbon::now()->subDay()]);

        $this->artisan('certificate:issues');

        Mail::assertNotQueued(WarningEmail::class);

    }

    #[Test]
    public function no_warning_email_should_be_sent_as_there_is_pending_creation(): void
    {
        Mail::fake();

        \App\Participation::factory()->create(['participation_url' => 'url//', 'created_at' => Carbon::now()]);

        $this->artisan('certificate:issues');

        Mail::assertNotQueued(WarningEmail::class);

    }
}
