<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/10/2018
 * Time: 4:25 ΜΜ
 */

namespace app\controllers;
use app\models\Task;
use app\models\User;

class ActionsController
{

    public function assign()
    {

        if(isset($_POST['submit'])){
            Task::assign_task($_POST['task'], $_POST['user']);
        }

        $tasks = Task::getUnassigned();
        $users = User::allUsers();

        return view('assign', compact('tasks', 'users'),passCred($_POST['username'],$_POST['password']));
    }

    public function add_task()
    {
        if(isset($_POST['submit'])) {
            if (Task::check($_POST['description']) == false) {
                $message = false;
                return view('add-task', all(),passCred($_POST['username'],$_POST['password']), compact('message'));
            }
            Task::addTask($_POST['description'], $_POST['assigned']);
        }
        $message = true;
        return view('add-task', all(),passCred($_POST['username'],$_POST['password']), compact('message'));
    }

    public function add_user()
    {
        if(isset($_POST['submit'])) {
            if (User::check($_POST['name']) == false) {
                $message = false;
                return view('add-user', all(),passCred($_POST['username'],$_POST['password']), compact('message'));
            }
            User::addUser($_POST['name'], $_POST['email'],$_POST['userPassword']);
        }
        $message = true;
        return view('add-user', all(),passCred($_POST['username'],$_POST['password']), compact('message'));
    }

    public function edit_user()
    {
        if(isset($_POST['submit'])){
            $id = (int) filter_var($_POST['user'], FILTER_SANITIZE_NUMBER_INT);
            $user = finduser($id);
            $user = $user[0];
            //var_dump($user);
            $message = true;
            return view('edit-user', compact('user') ,passCred($_POST['username'],$_POST['password']), compact('message'));
        }
        if(isset($_POST['edit-user'])){

            User::edit($_POST);
        }
        if ($_POST['message']== 'edit')
        {
            $user = finduser((int)$_POST['id']);
            $user = $user[0];
            $message = 'edit';
            return view('edit-user', compact('user'),passCred($_POST['username'],$_POST['password']), compact('message'));
        }

        $message = true;
        return view('edit-user', all(),passCred($_POST['username'],$_POST['password']), compact('message'));
    }

    public function edit_task()
    {
        if(isset($_POST['submit'])){
            $id = (int) filter_var($_POST['task'], FILTER_SANITIZE_NUMBER_INT);
            $task = findtask($id);
            $task = $task[0];
            $message = true;
            return view('edit-task', compact('task') ,passCred($_POST['username'],$_POST['password']), all());
        }
        if(isset($_POST['edit-task'])){

            Task::edit($_POST);
        }
        $message = true;
        return view('edit-task', all(),passCred($_POST['username'],$_POST['password']), compact('message'));
    }
}