<?php
require 'config.php';
$host; $dbName; $name; $password;

class Connector
{
    public static function connect()
    {
        try {
            // return $pdo = new PDO('mysql:host=localhost;dbname=myPHP', 'rd', '123');
            return $pdo = new PDO($host . $dbName, $name, $password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}