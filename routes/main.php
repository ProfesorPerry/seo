<?php

/** @var Router $router */

use Seo\Core\Router;

$router->get('/', [\Seo\Mvc\Controller\IndexController::class, 'index']);