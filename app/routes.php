<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 2:30 ΜΜ
 */

$router->get('', 'PagesController@home');
$router->get('store', 'PagesController@store');
$router->get('about', 'PagesController@about');
$router->get('logout', 'PagesController@logout');

$router->get('assign-task', 'TaskController@assign');
$router->post('assign-task', 'TaskController@assign');

$router->get('add', 'UserController@add');
$router->post('add', 'UserController@add');

$router->get('edit', 'UserController@edit');
$router->post('edit', 'UserController@edit');

$router->get('delete', 'UserController@delete');
$router->post('delete', 'UserController@delete');

$router->get('my-tasks', 'TaskController@mytasks');

$router->get('add', 'TaskController@add');
$router->post('add', 'TaskController@add');

$router->get('edit', 'TaskController@edit');
$router->post('edit', 'TaskController@edit');

$router->geT('delete', 'TaskController@delete');
$router->post('delete', 'TaskController@delete');


//$router->post('{controller}/{action}/{data}', '{controller}Controller@{action}');




