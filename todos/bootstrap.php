<?php
require 'database/QueryBuilder.php';
require 'database/Connector.php';
$dbConfig = require 'config.php';
require 'Task.php';
require 'User.php';
$pdo = Connector::connect($dbConfig['db']);
return new Query($pdo);
