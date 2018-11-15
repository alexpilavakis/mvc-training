<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 30/10/2018
 * Time: 6:47 ΜΜ
 */

namespace MVCTraining\app\models;
use MVCTraining\app\repositories\UserRepository;
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
        return UserRepository::insert($parameters);
    }
}