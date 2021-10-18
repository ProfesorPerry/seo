<?php

namespace Seo\Mvc\Controller;

use Seo\Core\View;

class IndexController extends AbstractController
{
    public function index()
    {
        return new View('dashboard.php');
    }
}