<?php

class Connector
{
    public static function connect($dbConfig)
    {
        try {
            return new PDO('mysql:host=localhost;'.$dbConfig['dbName'], 
            $dbConfig['name'],
             $dbConfig['password'],
             $dbConfig['options']);
        } catch (PDOException $e) {
            var_dump($dbConfig['host']);
            echo $dbconfig['host']/* .$dbConfig['dbName'], 
            $dbConfig['name'],
             $dbConfig['password'] */;
            die($e->getMessage());
        }
    }
}