<?php
require 'vendor/autoload.php';
require 'core/bootstrap.php';

// $router = new Router;
$uri = parse_url(trim($_SERVER['REQUEST_URI'], '/'), PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
// var_dump($_SERVER['REQUEST_URI']);
// die(var_dump($_SESSION));

Router::get('routes.php')
->direct($uri, $method);

