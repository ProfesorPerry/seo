<?php

namespace Test\Core;

use Exception;
use PHPUnit\Framework\TestCase;
use Seo\Core\Module;
use Seo\Core\Router;

class ModuleTest extends TestCase
{
    /** @test */
    public function it_returns_true_on_run()
    {
        $router = new Router();
        $router->get('/', function () {
            echo "test";
        });

        $module = new Module($router);
        $result = $module->run();

        $this->assertTrue($result);
    }

    /** @test */
    public function it_throws_an_exception_on_not_existing_class_provided_to_route()
    {
        $router = new Router();
        $router->get('/', [\Seo\Mvc\Controller\TestController::class, 'index']);

        $this->expectException(Exception::class);

        $module = new Module($router);
        $module->run();
    }
}