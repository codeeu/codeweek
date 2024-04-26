<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    'locales' => explode(',', env('LOCALES')),

    'providers' => ServiceProvider::defaultProviders()->merge([
        \App\Achievements\AchievementsServiceProvider::class,

        /*
         * Package Service Providers...
         */
        Intervention\Image\ImageServiceProvider::class,
        \Torann\GeoIP\GeoIPServiceProvider::class,
        MartinLindhe\VueInternationalizationGenerator\GeneratorProvider::class,
        willvincent\Feeds\FeedsServiceProvider::class,
        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        // App\Providers\NovaServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\CalendarServiceProvider::class,
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
        \SocialiteProviders\Manager\ServiceProvider::class,
    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([
        'Calendar' => App\Facades\Calendar::class,
        'Feeds' => willvincent\Feeds\Facades\FeedsFacade::class,
        'GeoIP' => \Torann\GeoIP\Facades\GeoIP::class,
        'Image' => Intervention\Image\Facades\Image::class,
    ])->toArray(),

];
