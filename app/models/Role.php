<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09/11/2018
 * Time: 4:37 ΜΜ
 */

namespace MVCTraining\app\models;
use MVCTraining\core\Container;


class Role
{

    public static function all()
    {
        $roles = Container::get('database')->selectAll('roles');
        return $roles;
    }

    public static function getRole($role_id)
    {
        $roles = Container::get('database')->search('roles', 'role_id', compact('role_id'));
        return $roles[0];
    }
}