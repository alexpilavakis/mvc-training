<?php


namespace MVCTraining\app\controllers;

use MVCTraining\app\models\{User, Task};

class PagesController
{
    public function home()
    {
        if(!empty($_GET)) {
            if (User::validate()){
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
        User::isLoggedin();
        $users = User::all();
        $tasks = Task::all();
        return view('store', compact('users', 'tasks'));
    }
    public function about()
    {
        User::isLoggedin();
        return view('about');
    }
    public function logout()
    {
        session_destroy();
        redirect('');
    }
}