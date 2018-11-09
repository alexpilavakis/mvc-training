<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/10/2018
 * Time: 4:58 ΜΜ
 */
$array = [
    'database'=> [
        'name'=> 'test',
        'username'=> 'root',
        'password'=> 'password',
        'connection'=>'mysql:host=localhost',
        'options'=> [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    ]

];
return $array;
