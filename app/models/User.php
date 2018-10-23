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
}
