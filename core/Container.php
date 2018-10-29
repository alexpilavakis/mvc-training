<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 2:31 ΜΜ
 */

namespace MVCTraining\core;

class Container
{


    protected static $registry = [];


    public static function bind($key, $value)
    {

        static::$registry[$key] = $value;

    }

    public static function get($key)
    {
        if (!array_key_exists($key, static::$registry))
        {
            throw new Exception("No such {$key} in the container");
        }

        return static::$registry[$key];
    }

}