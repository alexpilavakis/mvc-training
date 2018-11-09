<?php

/*

Assume data

users
-----

id  username isadmin
1   alex       1
2   valentinos 0


permissions
-----------

id action user_id
1  edit   1
2  edit   0
3  delete 1
4 delete 0


 */

$userService = new UserService();

$alexUser = $userService->findUserByUsername('alex');
//here I will get an Admin class as alex is an admin user

//Now i want to edit valentinos data
//First point is to check if I can do this with Alex logged in


$canDo = Permission::canDo('edit',$alexUser->id);

if($canDo){
  $valentinosUser = $userService->findUserByUsername('valentinos');
  $valentinosUser->edit(['username' => "poupouxios"];
}else{
  throw new Exception('cannot perform edit');
}


//assume now poupouxios logs in
$poupouxiosUser = $userService->findUserByUsername('poupouxios');
//here I will get a User class as poupouxios is an normal user

//Now i want to edit alex data
//First point is to check if I can do this with Poupouxios logged in


$canDo = Permission::canDo('edit',$poupouxiosUser->id);

if($canDo){
  $alexUser = $userService->findUserByUsername('alex');
  $alexUser->edit(['username' => "alex"];
}else{
  throw new Exception('cannot perform edit');
}
