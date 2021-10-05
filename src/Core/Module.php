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
        $paths = $this->router->getRoutes();

        foreach ($paths as $path => $callable) {
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
            if (!class_exists($callable[0])) {
                throw new Exception("Class '$callable[0]' not found.");
            }

            if (!method_exists($callable[0], $callable[1])) {
                throw new Exception("Method '$callable[1]' not found in class '$callable[0]'.");
            }

            call_user_func([new $callable[0], $callable[1]]);
        }
    }
}