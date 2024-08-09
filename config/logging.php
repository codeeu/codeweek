<?php

return [

    'channels' => [
        "stack" => [
            "driver" => "stack",
            "channels" => ["single", "daily"],
            "ignore_exceptions" => false,
        ],
        "single" => [
            "driver" => "single",
            "path" => storage_path("logs/laravel.log"),
            "level" => env("LOG_LEVEL", "debug"),
        ],
        "daily" => [
            "driver" => "daily",
            "path" => storage_path("logs/laravel.log"),
            "level" => env("LOG_LEVEL", "debug"),
            "days" => 14,
        ],
        'mails_sent' => [
            'driver' => 'single',
            'path' => storage_path('logs/mails_sent.log'),
            'level' => 'info',
            'permission' => 0660,
        ],
    ],

];
