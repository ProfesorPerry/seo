<?php

namespace Test\Core;

use PHPUnit\Framework\TestCase;
use Seo\Core\Router;
use Seo\Mvc\Controller\IndexController;

class RouterTest extends TestCase
{
    /** @test */
    public function it_creates_callable_action_in_routes_array()
    {
        $router = new Router();
        $router->get('/', function () {});
        $router->post('/', function () {});

        $routes = $router->getRoutes();

        foreach ($routes as $route) {
            $this->assertIsCallable($route);
        }
    }

    /** @test */
    public function it_creates_route_with_given_controller_and_action_name()
    {
        $router = new Router();
        $router->get('/', [IndexController::class, 'index']);
        $router->post('/', [IndexController::class, 'index']);

        $routes = $router->getRoutes();
        $expected = [
            '/'  => [IndexController::class, 'index'],
        ];

        $this->assertSame($expected, $routes);
    }
}