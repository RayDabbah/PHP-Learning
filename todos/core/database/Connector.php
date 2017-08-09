<?php

class Connector
{
    public static function connect($dbConfig)
    {
        try {
            return new PDO($dbConfig['host']. $dbConfig['dbName'], 
            $dbConfig['name'],
             $dbConfig['password'],
             $dbConfig['options']);
        } catch (PDOException $e) { 
            print_r($dbConfig);
            // echo 
            // $dbconfig['host'], $dbConfig['dbName'], 
            // $dbConfig['name'],
            //  $dbConfig['password'];
            die($e->getMessage());
        }
    }
}