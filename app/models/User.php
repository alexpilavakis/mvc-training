<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 4:10 ΜΜ
 */

namespace MVCTraining\app\models;

use MVCTraining\core\Container;

class User implements \Member
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $role;

    const USER = 'user';
    const ADMINISTRATOR = 'admin';
    //px meta
    // const MODERATOR = 3;
    // const EDITOR = 4;

    public function __construct($id,$name, $email, $password)
    {
        $this->id= $id;
        $this->name= $name;
        $this->email=$email;
        $this->password=$password;
        $this->role = self::USER;
    }
    public static function checkRole($user_id)
    {
        if (empty(Container::get('database')->search('admins', 'user_id', compact('user_id'))))
        {
            return self::USER;
        }
        else
        {
            return self::ADMINISTRATOR;
        }
    }

    public static function getUser($user_id)
    {
        $user = self::find($user_id);
        if (User::checkRole($user_id) == 'user')
        {
            $user = new User($user->user_id, $user->name, $user->email, $user->password );
        }
        else
        {
            $user = new Admin($user->user_id, $user->name, $user->email, $user->password );
        }
        return $user;
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
        $user_id = User::validUser($_GET['username'], $_GET['password']);
        if ($user_id == null)
        {
            return false;
        }
        else{
            $_SESSION['user_id'] = $user_id;
        }
        return true;
    }
    private static function validUser($name, $password)
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
    public static function all()
    {
        $users = Container::get('database')->selectAll('users');
        return $users;
    }

    public static function find($user_id)
    {
        $user = Container::get('database')->search('users', 'user_id', compact('user_id'));
        return $user[0];

    }
    public function check($name)
    {
        $users = Container::get('database')->selectAll('users');
        foreach ($users as $user) {
            if ($user->name == $name) {
                return false;
            }
        }
        return true;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function isAdmin()
    {
        return false;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function edit ($action)
    {
        redirect('store');
    }
    public function addUser($name, $email, $password)
    {
        redirect('store');
    }
    public function delete($id)
    {
        redirect('store');
    }
}
