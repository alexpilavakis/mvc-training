<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 15/10/2018
 * Time: 4:55 ΜΜ
 */

//namespace core\database;

class Connection
{
    public static function make($config){

        try
        {
            //return new PDO('mysql:host=localhost;dbname=mytodo', 'root', '******');
            return $pdo = new \PDO($config['connection'].';dbname='. $config['name'], $config['username'], $config['password'], $config['options']);
        }
        catch
        (PDOException $E){
            die($E->getMessage());
        }
    }

}