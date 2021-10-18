<?php

namespace Seo\Core;

class View
{
    public function __construct(string $path)
    {
        include Config::get('ui_path') . $path;
    }
}