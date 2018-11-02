<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/10/2018
 * Time: 4:58 ΜΜ
 */
$array = [
    'database'=> [
        'name'=> 'mytodo',
        'username'=> 'root',
        'password'=> 'pnd.crZa87',
        'connection'=>'mysql:host=localhost',
        'options'=> [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    ]

];
return $array;