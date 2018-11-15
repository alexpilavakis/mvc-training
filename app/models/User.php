<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 4:10 ΜΜ
 */

namespace MVCTraining\app\models;

use MVCTraining\app\factories\UserFactory;
use MVCTraining\app\repositories\TaskRepository;
use MVCTraining\app\repositories\UserRepository;

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
     * Check if given username exists in database, validate credentials and load into session
     *
     */
    public static function validate($name, $password)
    {
        $user_id = UserRepository::validate($name, $password);
        if ($user_id != null)
        {
            $_SESSION['user_id'] = $user_id;
            return true;
        }
        else
        {
            return false;
        }
    }
    /*
     * Check if user is logged in, find user and return instance
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
        $user = UserRepository::findByID($user_id);
        $factory = new UserFactory();
        return $factory->createMember($user);
    }
    /*
     * Get all Users
     */
    public static function all()
    {
        return UserRepository::all();
    }

    /*
     * Check if user with name X already exists
     *
     */
    public function check($name)
    {
        $users = UserRepository::findByName($name);
        foreach ($users as $user) {
            if ($user->name == $name) {
                return false;
            }
        }
        return true;
    }

    public function edit ($data)
    {
        UserRepository::edit($data['id'],['name'=> $data['name']]);
        UserRepository::edit($data['id'],['email'=>$data['email']]);
        UserRepository::edit($data['id'],['password'=>$data['pass']]);
        UserRepository::edit($data['id'],['role_id'=>$data['role']]);
    }
    public function delete ()
    {
        Permission::removePermissions($this->user_id);
        UserRepository::delete($this->user_id);
    }

    public function setDefaultPermissions()
    {
        if ($this->role == self::USER)
        {
            return;
        }
        elseif ($this->role  == self::MODERATOR)
        {
            Permission::givePermission($this->user_id, 'assign');
        }
        elseif ($this->role  == self::ADMIN)
        {
            Permission::givePermission($this->user_id, 'assign');
            Permission::givePermission($this->user_id, 'add');
            Permission::givePermission($this->user_id, 'edit');
            Permission::givePermission($this->user_id, 'delete');
        }
    }
    public function givePermission($action)
    {
        Permission::givePermission($this->user_id, $action);
    }
    public function removePermissions()
    {
        Permission::removePermissions($this->user_id);
    }

    public function myTasks()
    {
        return TaskRepository::myTasks($this->user_id);
    }

    public function canDo($action)
    {
        return Permission::valid_action($this->user_id, $action);
    }
    public function getRole()
    {
        return ucfirst(Role::getRole($this->role));
    }
    public function isAdmin()
    {
        return false;
    }
    public function isModerator()
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
