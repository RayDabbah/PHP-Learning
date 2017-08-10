<?php
$app =[];
require 'core/Router.php';
require 'core/database/QueryBuilder.php';
require 'core/database/Connector.php';
$app['config'] = require 'config.php';
require 'core/Task.php';
require 'core/User.php';
$app['database'] = new Query(
    Connector::connect($app['config']['db']));
