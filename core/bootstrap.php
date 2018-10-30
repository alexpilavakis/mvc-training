<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 2:30 ΜΜ
 */


use MVCTraining\core\Container;
use MVCTraining\app\models\User;

session_start();
Container::bind('config', require "config.php");

Container::bind('database',new QueryBuilder(
        Connection::make(Container::get('config')['database']))
);

function view($path, $data =[], $message= []){

    extract($data);
    extract($message);
    require "app/views/{$path}.view.php";
}

function redirect($path ){
    header("Location: /{$path}");
}