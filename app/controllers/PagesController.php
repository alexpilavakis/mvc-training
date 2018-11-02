<?php


namespace MVCTraining\app\controllers;

use MVCTraining\app\models\{Admin, User, Task};
use Member;

class PagesController
{
    public function home()
    {
        if(!empty($_GET)) {
            if (User::validate()){
                $user = User::find($_SESSION['user_id']);
                if (User::checkRole($user->user_id) == 'user')
                {
                    $member = new User($user->user_id, $user->name, $user->email, $user->password );
                }
                else
                {
                    $member = new Admin($user->user_id, $user->name, $user->email, $user->password );
                }
                $_SESSION['member'] = $member;
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
        //var_dump('Welcome'. $_SESSION['member']->getName(). ' ('. $_SESSION['member']->getRole().')');
        User::isLoggedin();
       // var_dump($member, 'Rolos '.$member->getRole());
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