<?php

class UserRepository
{
    public static function findUserByUsername($username)
    {
        //pseudocode here
        //assume that users table has a field that declares if user is admin or not
        $this->databaseConnection->select("select * from users where username = :username");
        $result = $this->databaseConnection->execute([':username' => $username]);
        if ($result->count() > 0) {
            return $result;
        }
    }
}
