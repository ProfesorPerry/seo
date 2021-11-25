<?php
declare(strict_types=1);

namespace Seo\Core;

use Exception;

class View
{
    /**
     * @param string $path
     * @throws Exception
     */
    public function __construct(string $path)
    {
        include Config::get('ui_path') . $path;
    }
}