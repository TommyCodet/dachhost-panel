<?php

return [

    'name' => 'DachHost',
    'logo' => env('APP_LOGO'),
    'favicon' => '/dachhost.svg',

    'version' => 'canary',

    'timezone' => 'UTC',

    'installed' => env('APP_INSTALLED', true),

    'exceptions' => [
        'report_all' => env('APP_REPORT_ALL_EXCEPTIONS', false),
    ],

    'fallback_locale' => 'en',

];
