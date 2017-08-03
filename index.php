<?php
$greet = 'Yankel Shmerelstein';
$greeting = "Hello $greet!!!!";

$foods = [
    'Kibbe',
    'Cholent',
    'Lahmaagine',
    'Farfel'
];
$animals = [
    'Cats',
    'Dogs',
    'Turtles',
    'Platypuses',
    'Otters',
    'Rabbits'
];
$animals[] = 'Aligators';
$ages = [
    'Yankel' => 45,
    'Shmerel' => 62,
    'David'=> 12,
    'Pinchos' => 21
];
$ages['Gedaliah'] = 76;
// var_dump($animals);
// var_dump($ages);
// echo 'Good morning! ' . $greet . ' !!!';
$tasks = [
    'toDo' => 'vacuum',
    'assignedTo' => 'נחום',
    'due by' => 'Thursday',
    'isDone' => false,
];
require 'views.php';