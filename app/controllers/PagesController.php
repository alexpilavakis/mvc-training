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
        $member = User::getUser($_SESSION['user_id']);
        $users = User::all();
        $tasks = Task::all();
        return view('store', compact('users', 'tasks', 'member'));
    }
    public function about()
    {
        User::isLoggedin();
        $member = User::getUser($_SESSION['user_id']);
        return view('about', compact('member'));
    }
    public function logout()
    {
        session_destroy();
        redirect('');
    }
}

// var_dump($member, 'Rolos '.$member->getRole());