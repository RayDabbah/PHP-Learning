<?php
$Query = require 'bootstrap.php';

$tasks = $Query->selectAll('todos', 'Task');

$users = $Query->selectAll('users', 'User');
require 'index.view.php';
