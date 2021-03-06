<?php

namespace Tests;

use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Mail;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();
        //$this->withoutExceptionHandling();
        $this->mockLocale();
        $this->mockBrowserCheck();
        Mail::fake();
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User');
        $this->actingAs($user);
        return $this;
    }

    protected function mockLocale(): void
    {
        $this->mock('App\Http\Middleware\Locale', function ($mock) {
            $mock->shouldReceive('handle')
                ->andReturnUsing(function ($request, \Closure $next) {
                    return $next($request);
                });
        });

    }

    protected function mockBrowserCheck(): void
    {

        $this->mock('App\Http\Middleware\CheckBrowser', function ($mock) {
            $mock->shouldReceive('handle')
                ->andReturnUsing(function ($request, \Closure $next) {
                    return $next($request);
                });
        });

    }


}