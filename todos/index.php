<?php
$Query = require 'bootstrap.php';

$tasks = $Query->selectAll('todos', 'Task');

$users = $Query->selectAll('users', 'User');
// die(var_dump($users));
require 'index.view.php';
