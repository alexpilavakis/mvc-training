<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/10/2018
 * Time: 4:59 ΜΜ
 */

namespace core;

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