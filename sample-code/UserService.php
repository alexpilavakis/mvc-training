<?php

class UserService
{
    public function __construct()
    {
    }

    /**
     * FInd a user and return the appropriate class
     * @param  [type] $username [description]
     * @return [type]           [description]
     */
    public function findUserByUsername($username)
    {
        $userRow = UserRepository::findUserByUsername($username);
        $data = $userRow->getData();
        $user = null;
        if ($userRow->isAdmin) {
            $user = new Admin($data);
        } else {
            $user = new User($data);
        }
        return $user;
    }
}
