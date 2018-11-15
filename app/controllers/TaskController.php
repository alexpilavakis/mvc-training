<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 25/10/2018
 * Time: 3:38 ΜΜ
 */

namespace MVCTraining\app\controllers;
use MVCTraining\app\models\{Permission, Task, User};


class TaskController
{
    public function mytasks()
    {
        $loginUser = User::login_status($_SESSION['user_id']);
        $tasks = $loginUser->myTasks();
        return view('my-tasks', compact('tasks','loginUser'));
    }

    public function assign()
    {
        $loginUser = User::login_status($_SESSION['user_id']);
        if (!Permission::valid_action($loginUser->getId(), 'assign')){
            redirect('store');
        }
        if(isset($_POST['submit'])){
            Task::assign_task($_POST['task'], $_POST['user']);
        }
        $tasks = Task::getUnassigned();
        $users = User::all();
        return view('assign', compact('tasks', 'users', 'loginUser'));
    }

    public function add()
    {
        $loginUser = User::login_status($_SESSION['user_id']);
        if (!Permission::valid_action($loginUser->getId(), 'add')){
            redirect('store');
        }
        if(isset($_POST['submit'])) {
            if (Task::check($_GET['description']) == false) {
                $message = false;
                return view('add-task', compact('users', 'loginUser'), compact('message'));
            }
            Task::add($_POST['description'], $_POST['assigned']);
        }
        $message = true;
        $users = User::all();
        //$tasks = Task::all();
        return view('add-task', compact('users', 'loginUser'), compact('message'));
    }
    public function edit($data = [])
    {
        $message = false;
        $loginUser = User::login_status($_SESSION['user_id']);
        if (!Permission::valid_action($loginUser->getId(), 'edit')){
            redirect('store');
        }
        if (isset($_POST['submit'])) {
            if(empty($data)) {
                $task = Task::find($_POST['task']);
            } else {
                $task = Task::find($data);
            }
            $users = User::all();
            return view('edit-task', compact('task', 'users', 'loginUser'));
        }
        if(isset($_POST['edit-task'])){

            Task::edit($_POST);
            $message = true;
        }
        $tasks = Task::all();
        return view('edit-task', compact('tasks', 'loginUser'), compact('message'));
    }
    public function delete($data = [])
    {
        $loginUser = User::login_status($_SESSION['user_id']);
        if (!Permission::valid_action($loginUser->getId(), 'delete')){
            redirect('store');
        }
        Task::delete($data);
        redirect('store');
    }
}