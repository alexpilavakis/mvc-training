<?php

namespace app\models;

use core\Container;

class User
{
    public static function validateUser($name, $password)
    {
        if (!empty($valid_users = Container::get('database')->search('users', 'name', compact('name')))) {
            foreach ($valid_users as $user) {
                if ($user->password == $password) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function check($name)
    {
        $users = Container::get('database')->selectAll('users');
        foreach ($users as $user) {
            if ($user->name == $name) {
                return false;
            }
        }
        return true;
    }

    public static function addUser($name, $email, $password)
    {
        $parameters = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        Container::get('database')->insert('users', $parameters);

        return true;
    }
}
