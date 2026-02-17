<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie', '/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost',
        'http://127.0.0.1',
        'http://localhost:8000',
        'https://*.ngrok-free.app',
        'https://*.ngrok.io',
        'https://*.tunnel.pyjam.as',
    ],

    'allowed_origins_patterns' => [
        '/^https?:\/\/(localhost|127\.0\.0\.1)(:\d+)?$/',
        '/^https?:\/\/[a-z0-9-]+\.ngrok(-free)?\.app$/',
    ],

    'allowed_headers' => ['*'],

    'exposed_headers' => ['X-Total-Count', 'X-Page-Current'],

    'max_age' => 86400,

    'supports_credentials' => true,

];
