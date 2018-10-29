<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 2:32 ΜΜ
 */

use MVCTraining\core\{Router, Request};

require "vendor/autoload.php";
require "core/bootstrap.php";

Router::load('app/routes.php')->direct(Request::getUri(), Request::getMethod());