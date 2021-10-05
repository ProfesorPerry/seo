<?php

namespace Seo\Core;

class Router
{
    /** @var array $routes */
    private array $routes = [];

    /**
     * Create GET method route.
     *
     * @param string $path
     * @param callable|array $action
     */
    public function get(string $path, callable|array $action)
    {
        if (is_callable($action)) {
            $this->routes[$path] = $action;
        }

        if (is_array($action)) {
            $this->routes[$path] = [$action[0], $action[1]];
        }
    }

    /**
     * Create POST route.
     *
     * @param string $path
     * @param callable|array $action
     */
    public function post(string $path, callable|array $action)
    {
        if (is_callable($action)) {
            $this->routes[$path] = $action;
        }

        if (is_array($action)) {
            $this->routes[$path] = [$action[0], $action[1]];
        }
    }

    /**
     * Get all defined routes.
     *
     * @return array Defined routes.
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}