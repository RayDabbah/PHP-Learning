<?php

function connect(){
 try {
  return  $pdo = new PDO('mysql: host=localhost;dbname=myPHP','rd', '123');
} catch (PDOException $e) {
    die($e->getMessage());
}
}

function fetchAllData($pdo, $table, $string)
{
    $pdo = connect();
    $statement = $pdo->prepare("SELECT * FROM $table");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS, $string);
}