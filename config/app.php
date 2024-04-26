<?php

use Illuminate\Support\Facades\Facade;

return [

    'locales' => explode(',', env('LOCALES')),

    'aliases' => Facade::defaultAliases()->merge([
        'Calendar' => App\Facades\Calendar::class,
        'Feeds' => willvincent\Feeds\Facades\FeedsFacade::class,
        'GeoIP' => \Torann\GeoIP\Facades\GeoIP::class,
        'Image' => Intervention\Image\Facades\Image::class,
    ])->toArray(),

];
