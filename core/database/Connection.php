<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 2:30 ΜΜ
 */

//namespace MVCTraining\core\database;

class Connection
{
    public static function make($config){

        try
        {
            //return new PDO('mysql:host=localhost;dbname=mytodo', 'root', '******');
            RETURN $pdo= new \PDO($config['connection'].';dbname='. $config['name'], $config['username'], $config['password'], $config['options']);
        }
        catch
        (\PDOException $E){
            die($E->getMessage());
        }
    }

}