<?php

namespace Tests\Feature;

use App\Mail\WarningEmail;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CertificatesIssuesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function warning_email_should_be_sent_as_certificates_are_not_generated()
    {
        Mail::fake();

        create('App\Participation', ['participation_url' => null, 'created_at' => Carbon::now()->subDay()]);

        $this->artisan('certificate:issues');

        Mail::assertQueued(WarningEmail::class);

    }

    /** @test */
    public function no_warning_email_should_be_sent_as_there_are_no_errors()
    {
        Mail::fake();

        create('App\Participation', ['participation_url' => 'url//', 'created_at' => Carbon::now()->subDay()]);

        $this->artisan('certificate:issues');

        Mail::assertNotQueued(WarningEmail::class);

    }

    /** @test */
    public function no_warning_email_should_be_sent_as_there_is_pending_creation()
    {
        Mail::fake();

        create('App\Participation', ['participation_url' => 'url//', 'created_at' => Carbon::now()]);

        $this->artisan('certificate:issues');

        Mail::assertNotQueued(WarningEmail::class);

    }
}
