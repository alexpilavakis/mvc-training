<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09/11/2018
 * Time: 4:12 ΜΜ
 */

namespace MVCTraining\app\models;
use MVCTraining\core\Container;

class Permission
{
    /**
     * Check in a table with permissions if user with id X can do this action
     * @param  [type] $action [description]
     * @param  [type] $user_id [description]
     */
    public static function valid_action($user_id, $action)
    {
        if (empty($user_actions = Container::get('database')->search('permissions', 'user_id', compact('user_id')))){
            return redirect('store');
        }else {
            foreach ($user_actions as $user_action) {
                if ($user_action->action == $action) {
                    return true;
                }
            }
        }
        return redirect('store');

    }

    public static function giveAssign($user_id)
    {
        $parameters = [
            'action' => 'assign',
            'user_id' => $user_id,
        ];
        Container::get('database')->insert('permissions', $parameters);
        return true;
    }
    public static function giveAdd($user_id)
    {
        $parameters = [
            'action' => 'add',
            'user_id' => $user_id,
        ];
        Container::get('database')->insert('permissions', $parameters);
        return true;
    }
    public static function giveEdit($user_id)
    {
        $parameters = [
            'action' => 'edit',
            'user_id' => $user_id,
        ];
        Container::get('database')->insert('permissions', $parameters);
        return true;
    }
    public static function giveDelete($user_id)
    {
        $parameters = [
            'action' => 'delete',
            'user_id' => $user_id,
        ];
        Container::get('database')->insert('permissions', $parameters);
        return true;
    }
}