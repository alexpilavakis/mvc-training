<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/11/2018
 * Time: 8:59 ΜΜ
 */

namespace MVCTraining\app\repositories;
use MVCTraining\core\Container;

class UserRepository
{
    public static function findByID ($user_id)
    {
        $user = Container::get('database')->search('users', 'user_id', compact('user_id'));
        return $user[0];
    }

    public static function findByName ($name)
    {
        $user = Container::get('database')->search('users', 'name', compact('name'));
        return $user[0];
    }

    public static function all()
    {
        return Container::get('database')->selectAll('users');
    }

    public static function validate($name, $password)
    {
        if (!empty($valid_users = Container::get('database')->search('users', 'name', compact('name')))) {
            foreach ($valid_users as $user) {
                if ($user->password == $password) {
                    return $user->user_id;
                }
            }
        }
        return null;
    }

    public static function edit($user_id, $action)
    {
        $parameters = [
            array_keys($action)[0] => array_values($action)[0],
            'user_id' => $user_id,
        ];
        Container::get('database')->update('users', $parameters );
    }

    public static function delete($user_id)
    {
        Container::get('database')->delete('users', compact('user_id'));
    }

    public static function insert($parameters)
    {
        return Container::get('database')->insert('users', $parameters);
    }
}