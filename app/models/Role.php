<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09/11/2018
 * Time: 4:37 ΜΜ
 */

namespace MVCTraining\app\models;
use MVCTraining\app\repositories\RoleRepository;


class Role
{

    public static function all()
    {
        return RoleRepository::all();
    }

    public static function getRole($role_id)
    {
        $role = RoleRepository::findRole($role_id);
        If (count($role) > 0){
            return $role[0]->role;
        }else{
            return '';

        }
    }
}