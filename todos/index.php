<?php
require 'Task.php';
require 'functions.php';

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

$tasks = fetchAllData($pdo, 'todos', 'Task');
    require 'index.view.php';