<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16/10/2018
 * Time: 2:43 ΜΜ
 */

namespace app\models;
use core\Container;
use Psr\Log\NullLogger;

class Task
{

    public static function getUnassigned()
    {
        $tasks = Container::get('database')->selectAll('tasks');

        $unassigned = array_filter($tasks, function ($task){
            return $task->assigned == NULL;
        });

        return $unassigned;

    }

    public static function assign_task($task, $user)
    {
        $parameters = [
            'assigned' => explode(" ",$user)[1],
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


    public static function addTask($description, $assigned)
    {
        if ($assigned == "Not Assigned") {
            $assigned = Null;
        }else
        {
            $assigned = explode(" ",$assigned)[1];
        }
        $parameters = [
            'description' => $description,
            'completed' => 0,
            'assigned' => $assigned
        ];
        Container::get('database')->insert('tasks', $parameters);

        return true;
    }

    public static function action ($post_values)
    {
        $action = preg_grep("/edit/", array_keys($post_values));

        if (!empty($action))
            self::edit($action);
        else
            self::delete(preg_grep("/delete/", array_keys($post_values)));
    }


    public static function edit ($action)
    {

        if ($action['assigned'] === '') {
            $action['assigned'] = null; // or 'NULL' for SQL
        }
        Container::get('database')->update('tasks', ['description'=> $action['description'], 'id' => $action['id']] );
        Container::get('database')->update('tasks', ['completed'=> $action['completed'], 'id' => $action['id']] );
        Container::get('database')->update('tasks', ['assigned'=> explode(" ",$action['assigned'])[1], 'id' => $action['id']] );
    }

    public static function delete ($action)
    {
        $id = array_values($action)[0];
        $id = (int) filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $task = findtask((int)$id);
        $description = $task[0]->description;
        Container::get('database')->delete('tasks',compact('description'));
    }
}