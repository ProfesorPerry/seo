<?php

namespace Test\Core;

use PHPUnit\Framework\TestCase;
use Seo\Core\Router;

class RouterTest extends TestCase
{
    /** @test */
    public function it_creates_callable_action_in_routes_array()
    {
        $router = new Router([]);
        $router->get('GET /', function () {});
        $router->post('POST /', function () {});

        $routes = $router->getRoutes();

        foreach ($routes as $route) {
            $this->assertIsCallable($route);
        }
    }

    /** @test */
    public function it_works_with_empty_array_as_constructor_parameter()
    {
        $router = new Router([]);
        $router->get('/', function () {});

        $routes = $router->getRoutes();

        $this->assertArrayHasKey('GET /', $routes);
    }
}