<?php
require 'database/QueryBuilder.php';
require 'database/Connector.php';
require 'Task.php';
require 'User.php';
$pdo = Connector::connect();
return new Query($pdo);
