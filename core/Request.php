<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 2:31 ΜΜ
 */

namespace MVCTraining\core;

class Request
{

    public static function getUri()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}