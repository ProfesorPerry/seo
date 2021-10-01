<?php

use Seo\Core\Module;
use Seo\Core\Router;

require __DIR__ . '/vendor/autoload.php';

$router = new Router([
    'routes' => [
        'path' => __DIR__ . '/routes/main.php',
    ],
]);

$router->get('/test', function () {
    echo 'Hello from test!';
});

$seoModule = new Module($router);
$seoModule->run();