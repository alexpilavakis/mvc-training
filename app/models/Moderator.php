<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09/11/2018
 * Time: 2:51 ΜΜ
 */

namespace MVCTraining\app\models;


class Moderator extends User
{
    public function isModerator()
    {
        return true;
    }
}