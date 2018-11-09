<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 4:10 ΜΜ
 */

namespace MVCTraining\app\models;

use MVCTraining\core\Container;
use MVCTraining\app\models\Role;

class User implements \Member
{
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $role;

    private const USER = 1;
    private const MODERATOR = 2;
    private const ADMIN = 3;

    public function __construct($user_id,$name, $email, $password, $role_id)
    {
        $this->user_id= $user_id;
        $this->name= $name;
        $this->email=$email;
        $this->password=$password;
        $this->role = $role_id;
    }

    /*
     *
     * Check if given username exists in database, validate credentials and load into session
     *
     *
     */
    public static function validate()
    {
        $user_id = User::validUser($_GET['username'], $_GET['password']);
        if ($user_id != null)
        {
            $_SESSION['user_id'] = $user_id;
            return true;
        }
        else{
            return false;
        }
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

    /*
     *
     * Check if user is logged in, find user and return instance
     *
     *
     */
    public static function login_status($user_id)
    {
        User::isLoggedin();
        return User::find($user_id);
    }

    public static function isLoggedin()
    {
        if ( isset( $_SESSION['user_id'] ) ){

        }
        else{
            redirect('');
        }
    }

    /*
     * Find user and return appropriate instance
     *
     */
    public static function find($user_id)
    {
        $user = Container::get('database')->search('users', 'user_id', compact('user_id'));
        $user = $user[0];
        if ($user->role_id == self::USER)
        {
            $user= new User($user->user_id, $user->name, $user->email, $user->password, $user->role_id );
        }
        elseif ($user->role_id == self::ADMIN)
        {
            $user = new Admin($user->user_id, $user->name, $user->email, $user->password, $user->role_id );
        }
        elseif ($user->role_id == self::MODERATOR)
        {
            $user = new Moderator($user->user_id, $user->name, $user->email, $user->password, $user->role_id );
        }
        return $user;

    }
    public static function all()
    {
        $users = Container::get('database')->selectAll('users');
        return $users;
    }

    /*
     * Check if user with name X already exists
     *
     */
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

    public function edit ($action)
    {
        Container::get('database')->update('users', ['name'=> $action['name'], 'user_id' => $action['id']] );
        Container::get('database')->update('users', ['email'=> $action['email'], 'user_id' => $action['id']] );
        Container::get('database')->update('users', ['password'=> $action['pass'], 'user_id' => $action['id']] );
        Container::get('database')->update('users', ['role_id'=> $action['role'], 'user_id' => $action['id']] );
    }
    public function delete ()
    {
        $name = $this->name;
        Container::get('database')->delete('users', compact('name'));
    }

    public function setDefaultPermissions()
    {
        if ($this->role == self::USER)
        {
            return;
        }
        elseif ($this->role  == self::MODERATOR)
        {
            Permission::giveAssign($this->user_id);
        }
        elseif ($this->role  == self::ADMIN)
        {
            Permission::giveAssign($this->user_id);
            Permission::giveAdd($this->user_id);
            Permission::giveEdit($this->user_id);
            Permission::giveDelete($this->user_id);
        }
    }

    public function getRole()
    {
            return "User";
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
    public function getId()
    {
        return $this->user_id;
    }
    public function add($name, $email, $password, $role_id)
    {
        redirect('store');
    }

}
