<?php
$app =[];
$app['config'] = require 'config.php';
$app['database'] = new Query(
    Connector::connect($app['config']['db']));
