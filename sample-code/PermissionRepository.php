<?php

class PermissionRepository
{
    public static function findActionByUserId($action, $userId)
    {
        //pseudocode here
        //assume that users table has a field that declares if user is admin or not
        $this->databaseConnection->select("select * from permissions where user_id = :userid and action = :action");
        $result = $this->databaseConnection->execute([':userid' => $userId, ':action' => $action]);
        if ($result->count() > 0) {
            return $result;
        }
    }
}
