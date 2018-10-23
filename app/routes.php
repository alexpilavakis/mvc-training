<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/10/2018
 * Time: 4:58 ΜΜ
 */

$router->get('', 'PagesController@login');
$router->post('home', 'PagesController@home');
$router->post('assign-task', 'ActionsController@assign');
$router->post('add-task', 'ActionsController@add_task');
$router->post('add-user', 'ActionsController@add_user');
$router->post('edit-user', 'ActionsController@edit_user');
$router->post('edit-task', 'ActionsController@edit_task');
$router->get('test', 'PagesController@test');

