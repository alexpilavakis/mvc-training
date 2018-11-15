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
    public function add($name, $email, $password, $role_id);
    public function edit ($action);
    public function delete ();

    public function getId();
    public function getName();
    public function getEmail();
    public function getRole();
}