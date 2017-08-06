<?php
// class ToDos
// {

//     public $description;
//     public $completed = false;
//     public function __construct($description)
//     {
//         $this->description = $description;
//     }
//     public function isComplete()
//     {
//         // don't know why you would need return here.
//         /* return */ $this->completed;
//     }
//     public function complete()
//     {
//         $this->completed = true;
//     }
// }
// $tasks = [
//     new ToDos('Go to Sleep.'),
//     new ToDos('Go to the bank.'),
//     new ToDos('Go learn in the בית מדרש.'),
//     new ToDos('Call you grandmother.'),
//     //  task => [
//     //     'toDo' => 'vacuum',
//     //     'assignedTo' => 'נחום',
//     //     'due by' => 'Thursday',
//     //     'isDone' => true,
//     //     'enjoyable' => true
//     // ] 
// ];
// // var_dump($tasks);
// $tasks[2]->complete();
// $tasks[0]->complete();
// $tasks[2]->isComplete();
// // var_dump($tasks);
$host = 'localhost';
$dB = 'myPHP';
$user = 'rd';
$password = '123';
try {
    $pdo = new PDO("mysql: host=$host;dbname=$dB",$user, $password);
} catch (PDOException $e) {
    var_dump($e);
    die('Database error.');
}
$statement = $pdo->prepare('SELECT * FROM todos');
$statement->execute();
die(var_dump($statement->fetchAll(PDO::FETCH_OBJ)));
// require 'index.view.php';