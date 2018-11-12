<?php


namespace MVCTraining\app\controllers;

use MVCTraining\app\models\{User, Task};

class PagesController
{
    public function home()
    {
        if(!empty($_GET)) {
            if (User::validate($_GET['username'], $_GET['password'])){
                redirect('store');
            }
            else {
                $message = false;
            }
        }
        return view('index', compact('message'));
    }

    public function store()
    {
        $loginUser = User::login_status($_SESSION['user_id']);
        if ($loginUser->role == 1)
        {
            $tasks = $loginUser->myTasks();
            $users [0] = $loginUser;
            $message = true;
        }
        else
        {
            $message = false;
            $users = User::all();
            $tasks = Task::all();
        }
        return view('store', compact('users', 'tasks', 'loginUser', 'message'));
    }
    public function about()
    {
        $loginUser = User::login_status($_SESSION['user_id']);
        return view('about', compact('loginUser'));
    }
    public function logout()
    {
        session_destroy();
        redirect('');
    }
}