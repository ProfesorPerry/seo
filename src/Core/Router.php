<?php
declare(strict_types=1);

namespace Seo\Core;

class Router
{
    /**
     * @var array
     */
    private array $routes = [];

    /**
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
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}