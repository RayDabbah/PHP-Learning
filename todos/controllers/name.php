<?php
// echo  $_POST[username];
App::get('database')->addUser('users', $_POST[username], $_POST[email], $_POST[password]);
$users = App::get('database')->selectAll('users', 'User');
require 'views/name.php';