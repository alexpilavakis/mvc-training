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
    public function __construct($id,$name, $email, $password)
    {
        parent::__construct($id,$name, $email, $password);
        $this->role = self::ADMINISTRATOR;
    }

    public function isAdmin()
    {
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
        $name = $user->name;
        Container::get('database')->delete('users', compact('name'));
    }
    public function allAdmins()
    {
        $admins = Container::get('database')->selectAll("admin");
        array_map(function ($admin){
            return self::find($admin->user_id);
        }, $admins);
    }
}