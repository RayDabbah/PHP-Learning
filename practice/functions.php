<?php
function ageCheck($age)
{
    if ($age >= 21) {
        echo 'You are aloud in';
    }
    else {
        echo 'You are too young to join!';
    }
}
$arr = [1, 3, 4, 'triangle', true, 4634, FALSE, 'watermelon'];
$implode = implode(',1,   ', $arr);
echo $implode;
$arr2 = [
    'name' => 'Chaim Yankel',
    'age' => '54',
    'Job' => 'Doctor',
    'Smichah'=> TRUE
];
var_dump(array_keys($arr2));
var_dump(implode('------',array_values($arr2)));
$name = 'Yankel';
$timeOfDay = 'Evening';
$weather = 'Comfortable';
printf('Good %s %s! How are you this %s? It is %s outside!', $timeOfDay, $name, $timeOfDay, $weather);
$name = 'Moshe';
$timeOfDay = 'morning';
$weather = 'breezy';

$greeting = sprintf('Good %s %s! How are you this %s? It is %s outside!', $timeOfDay, $name, $timeOfDay, $weather);
echo $greeting;
