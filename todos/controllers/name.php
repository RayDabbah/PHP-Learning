<?php
// echo  $_POST[username];
$app['database']->addUser('users', $_POST[username], $_POST[email], $_POST[password]);
$users = $app['database']->selectAll('users', 'User');
require 'views/name.php';