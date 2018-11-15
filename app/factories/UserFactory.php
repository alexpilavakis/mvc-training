<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12/11/2018
 * Time: 8:11 ΜΜ
 */

namespace MVCTraining\app\factories;
use MVCTraining\app\models\{User,Moderator, Admin};

class UserFactory
{
    public function createMember($user)
    {
        if ($user->role_id == 1)
        {
            $member= new User($user->user_id, $user->name, $user->email, $user->password, $user->role_id );
        }
        elseif ($user->role_id == 2)
        {
            $member = new Moderator($user->user_id, $user->name, $user->email, $user->password, $user->role_id );
        }
        elseif ($user->role_id == 3)
        {
            $member = new Admin($user->user_id, $user->name, $user->email, $user->password, $user->role_id );
        }
        return $member;
    }

}