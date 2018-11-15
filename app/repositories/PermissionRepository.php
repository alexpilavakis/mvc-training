<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/11/2018
 * Time: 1:13 ΜΜ
 */

namespace MVCTraining\app\repositories;
use MVCTraining\core\Container;

class PermissionRepository
{
    public static function getUserActions($user_id)
    {
        return Container::get('database')->search('permissions', 'user_id', compact('user_id'));
    }

    public static function allowAction($user_id, $action)
    {
        $parameters = [
            'action' => $action,
            'user_id' => $user_id,
        ];
        Container::get('database')->insert('permissions', $parameters);
    }

    public static function removePermissions($user_id)
    {
        Container::get('database')->delete('permissions', compact('user_id'));
    }
}