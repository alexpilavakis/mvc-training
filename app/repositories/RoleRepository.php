<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/11/2018
 * Time: 1:22 ΜΜ
 */

namespace MVCTraining\app\repositories;
use MVCTraining\core\Container;

class RoleRepository
{
    public static function all()
    {
        return Container::get('database')->selectAll('roles');
    }

    public static function findRole($role_id)
    {
        return Container::get('database')->search('roles', 'role_id', compact('role_id'));
    }
}