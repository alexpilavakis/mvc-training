<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 4:11 ΜΜ
 */

namespace MVCTraining\app\models;

use MVCTraining\app\repositories\TaskRepository;

class Task
{

    public static function all()
    {
        return TaskRepository::all();
    }

    public static function find($task_id)
    {
        return TaskRepository::findByID($task_id);
    }

    public static function getUnassigned()
    {
        $tasks = TaskRepository::all();
        $unassigned = array_filter($tasks, function ($task){
            return $task->user_id == 0;
        });

        return $unassigned;
    }
    public static function assign_task($task, $user)
    {
        $parameters = [
            'user_id' => (int)$user,
            'description' => $task
        ];
        TaskRepository::update($parameters);
        return true;
    }

    public static function check($description)
    {
        $tasks = TaskRepository::all();
        foreach ($tasks as $task) {
            if ($task->description == $description) {
                return false;
            }
        }
        return true;
    }
    public static function add($description, $assigned)
    {
        if ($assigned == '0') {
            $user_id = null;
        }else
        {
            $user_id = (int)$assigned;
        }
        $parameters = [
            'description' => $description,
            'completed' => 0,
            'user_id' => $user_id
        ];
        TaskRepository::insert($parameters);
        return true;
    }

    public static function edit ($data)
    {
        if ($data['assigned'] === '') {
            $data['assigned'] = null;
        }
        TaskRepository::edit($data['id'],['description'=> $data['description']]);
        TaskRepository::edit($data['id'],['completed'=> $data['completed']]);
        TaskRepository::edit($data['id'],['user_id'=> $data['assigned']]);
    }

    public static function delete ($task_id)
    {
        TaskRepository::delete($task_id);
    }

    public static function update ($user_id)
    {
        $assigned_tasks = TaskRepository::myTasks($user_id);
        foreach ($assigned_tasks as $assigned_task)
        {
            $parameters = [
                'user_id' => null,
                'task_id' => $assigned_task->task_id,
            ];
            TaskRepository::update($parameters);
            //Container::get('database')->update('tasks', ['user_id'=> null, 'task_id' => $assigned_task->task_id] );
        }
    }


}