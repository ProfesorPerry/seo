<?php

use Seo\Core\Router;

require __DIR__ . '/vendor/autoload.php';

new Router([
    'routes' => [
        'path' => __DIR__ . '/routes/main.php',
    ],
]);