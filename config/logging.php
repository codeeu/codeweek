<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

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
