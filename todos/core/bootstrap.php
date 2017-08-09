<?php
require 'core/Router.php';
require 'core/database/QueryBuilder.php';
require 'core/database/Connector.php';
$dbConfig = require 'config.php';
require 'core/Task.php';
require 'core/User.php';
$pdo = Connector::connect($dbConfig['db']);
return new Query($pdo);
