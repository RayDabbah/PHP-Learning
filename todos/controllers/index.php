<?php
$tasks = $Query->selectAll('todos', 'Task');

$users = $Query->selectAll('users', 'User');
require 'views/index.view.php';