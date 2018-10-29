<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 2:30 ΜΜ
 */

$router->get('', 'PagesController@home');
$router->post('store', 'PagesController@store');

$router->post('assign-task', 'TaskController@assign');

$router->post('add', 'UserController@add');
$router->post('edit', 'UserController@edit');
$router->post('delete', 'UserController@delete');

$router->post('add', 'TaskController@add');
$router->post('edit', 'TaskController@edit');
$router->post('delete', 'TaskController@delete');


//$router->post('{controller}/{action}/{data}', '{controller}Controller@{action}');




