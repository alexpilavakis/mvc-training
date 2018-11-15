<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/11/2018
 * Time: 10:21 ΜΜ
 */

namespace MVCTraining\app\repositories;
use MVCTraining\core\Container;


class TaskRepository
{
    public static function findByID ($task_id)
    {
        $task = Container::get('database')->search('tasks', 'task_id', compact('task_id'));
        return $task[0];
    }

    public static function findByDescription ($description)
    {
        $task = Container::get('database')->search('tasks', 'task_id', compact('description'));
        return $task[0];
    }

    public static function all()
    {
        return Container::get('database')->selectAll('tasks');
    }

    public static function update($parameters)
    {
        Container::get('database')->update('tasks',$parameters);
    }

    public static function edit($task_id, $action)
    {
        $parameters = [
            array_keys($action)[0] => array_values($action)[0],
            'task_id' => $task_id,
        ];
        Container::get('database')->update('tasks', $parameters );
    }

    public static function delete($task_id)
    {
        Container::get('database')->delete('tasks', compact('task_id'));
    }
    public static function insert($parameters)
    {
        Container::get('database')->insert('tasks', $parameters);
    }
    public static function myTasks($user_id)
    {
        return Container::get('database')->search('tasks', 'user_id', compact('user_id'));
    }
}