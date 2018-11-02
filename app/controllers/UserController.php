<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 25/10/2018
 * Time: 3:38 ΜΜ
 */

namespace MVCTraining\app\controllers;
use MVCTraining\app\models\{Admin, Task, User};

class UserController
{
    public function add()
    {
        User::isLoggedin();
        if(isset($_POST['submit'])) {
            if (User::check($_POST['name']) == false) {
                $message = false;
                return view('add-user', compact('users', 'tasks'), compact('message'));
            }
            Admin::addUser($_POST['name'], $_POST['email'],$_POST['userPassword']);
        }
        $message = true;
        return view('add-user', compact('users', 'tasks'), compact('message'));
    }
    public function edit($data = [])
    {
        User::isLoggedin();
        $message = false;
        if (isset($_POST['submit'])) {
            if(empty($data)) {
                $user = User::find($_POST['user']);
            } else {
                $user = User::find($data);
            }
            return view('edit-user', compact('user'));
        }
        if(isset($_POST['edit-user'])){

            Admin::edit($_POST);
            $message = true;
        }
        $users = User::all();
        return view('edit-user', compact('users'), compact('message'));

    }
    public function delete($data = [])
    {
        User::isLoggedin();
        Task::update($data);
        Admin::delete($data);
        $users = User::all();
        $tasks = Task::all();
        return view('store', compact('users', 'tasks'));
    }
}