<?php

namespace Seo\Core;

use Exception;
use Symfony\Component\HttpFoundation\Request;

class Module
{
    /** @var Router $router */
    private Router $router;

    /**
     * Init SEO module.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Run SEO module.
     *
     * @throws Exception
     */
    public function run()
    {
        $request = Request::createFromGlobals();
        $routes = $this->router->getRoutes();

        foreach ($routes as $path => $callable) {
            $routeMatched = $request->getPathInfo() === $path;

            if ($routeMatched) {
                $this->callAction($callable);
            }
        }
    }

    /**
     * Call action in the controller.
     *
     * @param array|callable $callable
     * @throws Exception
     */
    private function callAction(array|callable $callable)
    {
        if (is_callable($callable)) {
            $callable();
        }

        if (is_array($callable)) {
            if (!class_exists($callable['controller'])) {
                throw new Exception("Class '{$callable['controller']}' not found.");
            }

            if (!method_exists($callable['controller'], $callable['action'])) {
                throw new Exception("Method '{$callable['action']}' not found in class '{$callable['controller']}'.");
            }

            call_user_func([$callable['controller'], $callable['action']]);
        }
    }
}