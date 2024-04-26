<?php

return [

    'channels' => [
        'mails_sent' => [
            'driver' => 'single',
            'path' => storage_path('logs/mails_sent.log'),
            'level' => 'info',
            'permission' => 0660,
        ],
    ],

];
