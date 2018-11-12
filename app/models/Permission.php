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
    public static $actions = [
        'assign' => 'assign',
        'add' => 'add',
        'edit' => 'edit',
        'delete' => 'delete'
        ];

    public static function valid_action($user_id, $action)
    {
        if (!empty($user_actions = Container::get('database')->search('permissions', 'user_id', compact('user_id'))))
        {
            foreach ($user_actions as $user_action) {
                if ($user_action->action == $action) {
                    return true;
                }
            }
        }
        return false;
    }
    public static function allTypes()
    {
        return self::$actions;
    }
    public static function givePermission($user_id, $action)
    {
        $parameters = [
            'action' => $action,
            'user_id' => $user_id,
        ];
        Container::get('database')->insert('permissions', $parameters);
        return true;
    }

    public static function removePermissions($user_id)
    {
        Container::get('database')->delete('permissions', compact('user_id'));
    }
}