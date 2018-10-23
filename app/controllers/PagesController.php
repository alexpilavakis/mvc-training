<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/10/2018
 * Time: 5:30 ΜΜ
 */

namespace app\controllers;

use app\models\User;
use app\models\Task;

class PagesController
{
    protected $action;
    protected $model;

    public function login()
    {
        return view('index');
    }

    public function home()
    {
        if (!User::validateUser($_POST['username'], $_POST['password'])) {          //Validate User and enter otherwise return to login page
            return view('index', passCred($_POST['username'], $_POST['password']));
            //redirect('');
        }
        if (count(array_keys($_POST)) > 2) {
            $this->model = preg_grep("/description/", array_keys($_POST));
            if (empty($this->model)) {                                              // Check if action is on User or Task
                $user = User::action($_POST);
                $message = 'edit';
                return view('home', compact('user'), passCred($_POST['username'], $_POST['password']), compact('message'));
            } else {
                Task::action($_POST);
            }
        }

        return view('home', all(), passCred($_POST['username'], $_POST['password']));
    }

    public function test()
    {
        return view('test');
    }
}
