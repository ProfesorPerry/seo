<?php

namespace Seo\Core;

use Exception;

class Config
{
    /**
     * @var array $config
     */
    private static array $config = [
        'ui_path' => 'ui/',
    ];

    /**
     * @param string $key
     * @return mixed
     * @throws Exception
     */
    public static function get(string $key): mixed
    {
        if (!array_key_exists($key, static::$config)) {
            throw new Exception("Config key $key not found");
        }

        return static::$config[$key];
    }
}