<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 4:10 ΜΜ
 */

namespace MVCTraining\app\models;

use MVCTraining\core\Container;

class User
{
    public static function all()
    {
        $users = Container::get('database')->selectAll('users');
        return $users;
    }

    public static function find($user_id)
    {
        return Container::get('database')->search('users', 'user_id', compact('user_id'));
    }

    public static function validUser($name, $password)
    {
        if (!empty($valid_users = Container::get('database')->search('users', 'name', compact('name')))) {
            foreach ($valid_users as $user) {
                if ($user->password == $password) {
                    return $user->name;
                }
            }
        }
        return null;
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
    public static function edit ($action)
    {
        Container::get('database')->update('users', ['name'=> $action['name'], 'user_id' => $action['id']] );
        Container::get('database')->update('users', ['email'=> $action['email'], 'user_id' => $action['id']] );
        Container::get('database')->update('users', ['password'=> $action['pass'], 'user_id' => $action['id']] );
    }
    public static function delete ($id)
    {
        $user = User::find($id);
        $name = $user[0]->name;
        Container::get('database')->delete('users', compact('name'));
    }
    public static function isLoggedin()
    {
        if ( isset( $_SESSION['user_id'] ) ) {
            // Grab user data from the database using the username
            // Let them access the "logged in only" pages
        } else {
            // Redirect them to the login page
            redirect('');
        }

    }

    public static function validate()
    {
        $username = User::validUser($_GET['username'], $_GET['password']);
        if ($username == null)
        {
            return false;
        }
        else{
            $_SESSION['user_id'] = $username;
        }
        return true;
    }

}