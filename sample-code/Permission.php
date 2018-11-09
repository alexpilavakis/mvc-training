<?php

class Permission
{


  /**
   * Check in a table with permissions if the user X with id Y can do this action
   * @param  [type] $action [description]
   * @param  [type] $userId [description]
   */
    public static function canUserDo($action, $userId)
    {
      //table structure
      //id, action, user_id
      $permission = PermissionRepository::findActionByUserId($action,$userId);
      $data = $permission->getData();
      if($data->count() > 0){
        returnt true;
      }
      return false;
    }
}
