<?php
class Connecter
{
    public static function connect()
    {
        try {
            return $pdo = new PDO('mysql:host=localhost;dbname=myPHP', 'rd', '123');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}