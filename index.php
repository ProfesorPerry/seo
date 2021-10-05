<?php

use Seo\Core\Module;
use Seo\Core\Router;

require __DIR__ . '/vendor/autoload.php';

$router = new Router();

require __DIR__ . '/routes/main.php';

$module = new Module($router);
$module->run();