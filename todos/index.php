<?php
require 'database/QueryBuilder.php';
require 'database/Connecter.php';
require 'Task.php';
require 'User.php';
 $pdo =  Connecter::connect();
$taskQuery = new Query($pdo);
 $tasks = $taskQuery->selectAll('todos', 'Task');
$userQuery = new Query($pdo);
$users = $userQuery->selectAll('users', 'User');
require 'index.view.php';