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
        $member = User::getUser($_SESSION['user_id']);
        if(isset($_POST['submit'])) {
            if ($member::check($_POST['name']) == false) {
                $message = false;
                return view('add-user', compact('users', 'tasks', 'member'), compact('message'));
            }
            $member::addUser($_POST['name'], $_POST['email'],$_POST['userPassword']);
        }
        $message = true;
        return view('add-user', compact('users', 'tasks', 'member'), compact('message'));
    }
    public function edit($data = [])
    {
        User::isLoggedin();
        $member = User::getUser($_SESSION['user_id']);
        $message = false;
        if (isset($_POST['submit'])) {
            if(empty($data)) {
                $user = User::find($_POST['user']);
            } else {
                $user = User::find($data);
            }
            return view('edit-user', compact('user', 'member'));
        }
        if(isset($_POST['edit-user'])){

            $member::edit($_POST);
            $message = true;
        }
        $users = User::all();
        return view('edit-user', compact('users', 'member'), compact('message'));

    }
    public function delete($data = [])
    {
        User::isLoggedin();
        $member = User::getUser($_SESSION['user_id']);
        Task::update($data);
        $member::delete($data);
        $users = User::all();
        $tasks = Task::all();
        return view('store', compact('users', 'tasks', 'member'));
    }
}