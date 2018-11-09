<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/10/2018
 * Time: 6:47 ΜΜ
 */

namespace MVCTraining\app\models;
use MVCTraining\core\Container;


class Admin extends User
{
    public function isAdmin()
    {
        return true;
    }

    public function add($name, $email, $password, $role_id)
    {
        $parameters = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id
        ];
        return Container::get('database')->insert('users', $parameters);
    }
    public function allAdmins()
    {
        $admins = Container::get('database')->selectAll("admin");
        array_map(function ($admin){
            return self::find($admin->user_id);
        }, $admins);
    }
    public function getRole()
    {
        return "Admin";

    }
}