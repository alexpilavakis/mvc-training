<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 25/10/2018
 * Time: 3:38 ΜΜ
 */

namespace MVCTraining\app\controllers;
use MVCTraining\app\models\{Task, User,Permission, Role};
use MVCTraining\core\Container;

class UserController
{
    public function add()
    {
        $loginUser = User::login_status($_SESSION['user_id']);
        Permission::valid_action($loginUser->getId(), 'add');
        $roles = Role::all();
        if(isset($_POST['submit'])) {
            if ($loginUser->check($_POST['name']) == false) {
                $message = false;
                return view('add-user', compact('users', 'tasks', 'roles', 'loginUser'), compact('message'));
            }
            $newID =  $loginUser->add($_POST['name'], $_POST['email'],$_POST['userPassword'], $_POST['role']);
            $user = User::find($newID);
            $user->setDefaultPermissions();
        }
        $message = true;
        return view('add-user', compact('users', 'tasks', 'roles', 'loginUser'), compact('message'));
    }
    public function edit($data = [])
    {
        $loginUser = User::login_status($_SESSION['user_id']);
        Permission::valid_action($loginUser->getId(), 'edit');
        $roles = Role::all();
        $message = false;
        if (isset($_POST['submit'])) {
            if(empty($data)) {
                $user = User::find($_POST['user']);
            } else {
                $user = User::find($data);
            }
            return view('edit-user', compact('user', 'roles', 'loginUser'));
        }
        if(isset($_POST['edit-user'])){
            $user = User::find($_POST['id']);
            $user->edit($_POST);
            $message = true;
        }
        $users = User::all();
        return view('edit-user', compact('users', 'loginUser'), compact('message'));

    }
    public function delete($data = [])
    {
        $loginUser = User::login_status($_SESSION['user_id']);
        Permission::valid_action($loginUser->getId(), 'delete');
        Task::update($data);
        $user = User::find($data);
        $user->delete();
        $users = User::all();
        $tasks = Task::all();
        redirect('store');
        //return view('store', compact('users', 'tasks', 'loginUser'));
    }
}