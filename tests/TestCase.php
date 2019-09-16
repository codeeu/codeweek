<?php
namespace Tests;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp() :void
    {
        parent::setUp();
        //$this->withoutExceptionHandling();
        $this->mockLocale();
    }
    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User');
        $this->actingAs($user);
        return $this;
    }

    protected function mockLocale(): void
    {
        $corsMiddleware = Mockery::mock('App\Http\Middleware\Locale');
        $corsMiddleware->shouldReceive('handle')
            ->andReturnUsing(function ($request, \Closure $next) {
                return $next($request);
            });

        \App::instance('App\Http\Middleware\Locale', $corsMiddleware);
    }


}