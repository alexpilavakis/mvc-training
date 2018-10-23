<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/10/2018
 * Time: 4:57 ΜΜ
 */

use core\{Router, Request};

require "vendor/autoload.php";
require "core/bootstrap.php";

Router::load('app/routes.php')->direct(Request::getUri(), Request::getMethod());