<?php

return [
    'administrator' => env('ADMIN_EMAIL', 'admin@codeweek.test'),
    'app_url' => env('APP_URL', 'http://codeweek.test'),
    'resources_url' => env('RESOURCES_URL', 'http://codeweek.test/resources'),
    'pdflatex_path' => env('PDFLATEX_PATH', ''),
    'db_connection' => env('DB_CONNECTION', ''),
    'aws_url' => env('AWS_URL', ''),
    'relocation_country' => env('RELOCATION_COUNTRY', ''),
    'MAPS_MAPBOX_ACCESS_TOKEN' => env('MAPS_MAPBOX_ACCESS_TOKEN', ''),
    'MAP_TILES' => env('MAP_TILES', ''),
    'EEDUCATION_CLIENTID' => env('EEDUCATION_CLIENTID', null),
    'LOCALES' => env('LOCALES', null),
    'blog_url' => env('BLOG_URL', 'https://codeweek.eu/blog'),
];
