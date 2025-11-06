<?php

return [

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    'disks' => [
        'latex' => [
            'driver' => 'local',
            'root'   => resource_path('latex'),
        ],

        'meet-and-code' => [
            'driver' => 'local',
            'root' => public_path('rss'),
            'url' => config('codeweek.app_url').'/rss',
        ],

        'excel' => [
            'driver' => 'local',
            'root' => resource_path('excel'),
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'visibility' => 'public',
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        'resources' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('RESOURCES_BUCKET'),
            'url' => env('RESOURCES_URL'),
            'visibility' => 'public',
        ],
    ],

];
