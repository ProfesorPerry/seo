<?php

namespace Seo\Core;

class Router
{
    private array $routes;

    public function __construct(array $config)
    {
        $routesPath = $config['routes']['path'];
        $this->routes = require $routesPath;

        var_dump($this->routes);die;
    }

    public function redirect()
    {
        $uri = $_SERVER['REQUEST_URI'];
    }
}