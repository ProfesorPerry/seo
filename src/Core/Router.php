<?php

namespace Seo\Core;

class Router
{
    /** @var array $routes */
    private array $routes;

    /**
     * Init routes with given config.
     * @param array $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Create GET method route.
     *
     * @param string $path
     * @param callable|array $action
     */
    public function get(string $path, callable|array $action)
    {
        if (is_callable($action)) {
            $this->routes['GET ' . $path] = $action;
        }

        if (is_array($action)) {
            $this->routes['GET ' . $path] = [$action['controller'], $action['method']];
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
            $this->routes['POST ' . $path] = $action;
        }

        if (is_array($action)) {
            $this->routes['POST ' . $path] = [$action['controller'], $action['method']];
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