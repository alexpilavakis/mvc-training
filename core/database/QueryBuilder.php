<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22/10/2018
 * Time: 2:30 ΜΜ
 */

//namespace MVCTraining\core\database;

class QueryBuilder
{

    protected $pdo;
    private $statement;

    public function __construct($pdo)
    {

        $this->pdo = $pdo;

    }

    public function selectAll($table)
    {
        $this->statement = $this->pdo->prepare("select * FROM {$table}");

        $this->statement->execute();

        return $this->statement->fetchAll(PDO::FETCH_CLASS);

    }

    public function insert($table, $parameters)
    {

        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(',', array_keys($parameters)),
            ":" . implode(',:', array_keys($parameters))
        );
        //die(var_dump($sql, $parameters));
        try {

            $this->statement = $this->pdo->prepare($sql);
            $this->statement->execute($parameters);
            $lastid= $this->pdo->lastInsertId();
            return $lastid;

        } catch (Exception $e) {

            die("Whoops, something went wrong".  $e);
        }

    }
    public function search($table, $name, $value)
    {
        $sql = sprintf(
            'select * from %s where %s like %s',
            $table,
            $name,
            ':' . $name
        );
        try {
            $this->statement = $this->pdo->prepare($sql);

            $this->statement->execute($value);
            return $this->statement->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {

            die("Whoops, something went wrong". $e);
        }


    }

    public function update($table, $parameters)
    {
        $sql = sprintf(
            'update %s set %s = %s where %s = %s',
            $table,
            array_keys($parameters)[0],
            ":" . array_keys($parameters)[0],
            array_keys($parameters)[1],
            ":" . array_keys($parameters)[1]
        );
        try {

            $this->statement = $this->pdo->prepare($sql);

            $this->statement->execute($parameters);

        } catch (Exception $e) {

            die("Whoops, something went wrong". $e);
        }

    }

    public function delete($table, $parameters)
    {
        $sql = sprintf(
            'delete from %s where %s = %s',
            $table,
            array_keys($parameters)[0],
            ":" . array_keys($parameters)[0]
        );
        try {

            $this->statement = $this->pdo->prepare($sql);

            $this->statement->execute($parameters);

        } catch (Exception $e) {

            die("Whoops, something went wrong". $e);
        }


    }
}