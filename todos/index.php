<?php
// require 'database/QueryBuilder.php';
require 'database/Connecter.php';
require 'functions.php';
require 'Task.php';
require 'User.php';
/* $pdo = */ Connecter::connect();
// $tasks = new Query($pdo, 'todos', 'Task');
// $users = new Query($pdo, 'users', 'User');
$tasks = fetchAllData('todos', 'Task');
$users = fetchAllData('users', 'User');
require 'index.view.php';