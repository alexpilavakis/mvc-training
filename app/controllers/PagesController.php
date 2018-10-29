<?php


namespace MVCTraining\app\controllers;

use MVCTraining\app\models\{User, Task};

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function store()
    {
        session_start();
        if(!empty($_POST)){
            if (isset($_POST['username'])&& ($_POST['password'])){
                $username = User::validate($_POST['username'], $_POST['password']);
                if (($username)!= null){
                    $_SESSION['username']= $username;
                }
                else
                    redirect('');
            }

        }
        $users = User::all();
        $tasks = Task::all();
        return view('store', compact('users', 'tasks'));
    }
}