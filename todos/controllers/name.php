<?php
// echo  $_POST[username];
$app['database']->addUser('users', $_POST[username], $_POST[email], $_POST[password]);
require 'views/name.php';