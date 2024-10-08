<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Mail;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        //$this->withoutExceptionHandling();
        $this->mockLocale();
        $this->mockBrowserCheck();
        $this->withoutVite();
        Mail::fake();
    }

    protected function signIn($user = null)
    {
        $user = $user ?: \App\User::factory()->create();
        $this->actingAs($user);

        return $this;
    }

    protected function mockLocale(): void
    {
        $this->mock(\App\Http\Middleware\Locale::class, function ($mock) {
            $mock->shouldReceive('handle')
                ->andReturnUsing(function ($request, \Closure $next) {
                    return $next($request);
                });
        });

    }

    protected function mockBrowserCheck(): void
    {

        $this->mock(\App\Http\Middleware\CheckBrowser::class, function ($mock) {
            $mock->shouldReceive('handle')
                ->andReturnUsing(function ($request, \Closure $next) {
                    return $next($request);
                });
        });

    }
}
