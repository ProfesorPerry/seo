<?php

use Seo\Mvc\Controller\IndexController;

return [
    'GET /' => [IndexController::class, 'index'],
    'GET /action' => function () {
        echo 'Hello world!';
    }
];
