<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 4:11 ΜΜ
 */

namespace MVCTraining\app\models;

use MVCTraining\core\Container;

class Task
{

    public static function all()
    {
        $tasks = Container::get('database')->selectAll('tasks');
        return $tasks;
    }

    public static function find($task_id)
    {
        $task = Container::get('database')->search('tasks', 'task_id', compact('task_id'));
        return $task[0];
    }

    public static function getUnassigned()
    {
        $tasks = Container::get('database')->selectAll('tasks');

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
        Container::get('database')->update('tasks',$parameters);
        return true;
    }

    public static function check($description)
    {
        $tasks = Container::get('database')->selectAll('tasks');
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
        Container::get('database')->insert('tasks', $parameters);
        return true;
    }

    public static function edit ($action)
    {
        if ($action['assigned'] === '') {
            $action['assigned'] = null;
        }
        Container::get('database')->update('tasks', ['description'=> $action['description'], 'task_id' => $action['id']] );
        Container::get('database')->update('tasks', ['completed'=> $action['completed'], 'task_id' => $action['id']] );
        Container::get('database')->update('tasks', ['user_id'=> $action['assigned'], 'task_id' => $action['id']] );

    }

    public static function delete ($id)
    {
        $task = Task::find($id);
        $description = $task->description;
        Container::get('database')->delete('tasks', compact('description'));
    }

    public static function update ($user_id)
    {
        $assigned_tasks = Container::get('database')->search('tasks', 'user_id', compact('user_id'));
        foreach ($assigned_tasks as $assigned_task)
        {
            Container::get('database')->update('tasks', ['user_id'=> null, 'task_id' => $assigned_task->task_id] );
        }
    }

}