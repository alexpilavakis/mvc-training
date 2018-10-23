<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/10/2018
 * Time: 4:59 ΜΜ
 */


use core\Container;

//require "Request.php";
//require "Router.php";
//require "Container.php";
//require "database/Connection.php";
//require "database/QueryBuilder.php";


//$config = require "config.php";

Container::bind('config', require "config.php");


//$pdo = Connection::make($config);

//$config['database']= new QueryBuilder($pdo);

Container::bind(
    'database',
    new QueryBuilder(
    Connection::make(Container::get('config')['database'])
)
);

function view($path, $data =[], $data2=[], $message= [])
{
    extract($data);
    extract($data2);
    extract($message);
    require "app/views/{$path}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}

function all()
{
    $users = Container::get('database')->selectAll('users');
    $tasks = Container::get('database')->selectAll('tasks');
    return (compact('users', 'tasks'));
}

function passCred($username, $password)
{
    return (compact('username', 'password'));
}

function finduser($primary_key)
{
    $id = (int)$primary_key;
    return Container::get('database')->search('users', 'id', compact('id'));
}

function findtask($primary_key)
{
    $id = (int)$primary_key;
    return Container::get('database')->search('tasks', 'id', compact('id'));
}
