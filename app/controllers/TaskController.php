<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 25/10/2018
 * Time: 3:38 ΜΜ
 */

namespace MVCTraining\app\controllers;
use MVCTraining\app\models\{Task, User};


class TaskController
{
    public function assign()
    {
        User::isLoggedin();
        if(isset($_POST['submit'])){
            Task::assign_task($_POST['task'], $_POST['user']);
        }

        $tasks = Task::getUnassigned();
        $users = User::all();

        return view('assign', compact('tasks', 'users'));
    }
    public function add()
    {
        User::isLoggedin();
        if(isset($_POST['submit'])) {
            if (Task::check($_POST['description']) == false) {
                $message = false;
                return view('add-task', compact('users', 'tasks'), compact('message'));
            }
            Task::addTask($_POST['description'], $_POST['assigned']);
        }
        $message = true;
        $users = User::all();
        $tasks = Task::all();
        return view('add-task', compact('users', 'tasks'), compact('message'));
    }
    public function edit($data = [])
    {
        $message = false;
        if (isset($_POST['submit'])) {
            if(empty($data)) {
                $task = Task::find($_POST['task']);
            } else {
                $task = Task::find($data);
            }
            $task = $task[0];
            $users = User::all();
            return view('edit-task', compact('task', 'users'));
        }
        if(isset($_POST['edit-task'])){

            Task::edit($_POST);
            $message = true;
        }
        $tasks = Task::all();
        return view('edit-task', compact('tasks'), compact('message'));
    }
    public function delete($data = [])
    {
        Task::delete($data);
        $users = User::all();
        $tasks = Task::all();
        return view('store', compact('users', 'tasks'));
    }
}