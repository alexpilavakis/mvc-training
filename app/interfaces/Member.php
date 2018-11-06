<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 01/11/2018
 * Time: 11:39 ΠΜ
 */

interface Member
{
    public function isAdmin();
    public function check($name);
    public function edit ($action);
    public function addUser($name, $email, $password);
    public function delete ($id);

    public function getRole();
    public function getName();
    public function getEmail();


}