<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Sentry\Laravel\Integration;

return Application::configure(basePath: dirname(__DIR__))
    ->withProviders([
        \Intervention\Image\ImageServiceProvider::class,
        \Torann\GeoIP\GeoIPServiceProvider::class,
        \MartinLindhe\VueInternationalizationGenerator\GeneratorProvider::class,
        \willvincent\Feeds\FeedsServiceProvider::class,
        \Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class
    ])
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        // channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(fn () => route('login'));
        $middleware->redirectUsersTo('/');

        $middleware->append([
            \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        ]);

        $middleware->web([
            \App\Http\Middleware\EnsureNovaMainDashboard::class,
            \App\Http\Middleware\CheckBrowser::class,
            \App\Http\Middleware\Locale::class,
            \App\Http\Middleware\CheckConsent::class
        ]);

        $middleware->throttleApi('60,1');

        $middleware->replace(\Illuminate\Http\Middleware\TrustProxies::class, \App\Http\Middleware\TrustProxies::class);

        $middleware->alias([
            'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'super.certificate.admin' => \App\Http\Middleware\EnsureSuperCertificateAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        Integration::handles($exceptions);
    })->create();

