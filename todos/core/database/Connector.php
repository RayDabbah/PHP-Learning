<?php

class Connector
{
    public static function connect($dbConfig)
    {
        try {

            return new PDO('pgsql:host=localhost;port=5432;dbname=todos;user=postgres;password=Rachamim1'
            //     $dbConfig['host']. $dbConfig['dbName'], 
            // $dbConfig['name'],
            //  $dbConfig['password'],
            //  $dbConfig['options']
        );
        } catch (PDOException $e) { 
            print_r($dbConfig);
            die($e->getMessage());
        }
    }
}