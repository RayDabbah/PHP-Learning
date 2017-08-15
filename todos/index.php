<?php
require 'core/bootstrap.php';

// $router = new Router;

$uri = parse_url(trim($_SERVER['REQUEST_URI'], '/'), PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
// var_dump($_SERVER['REQUEST_URI']);
 
require Router::get('routes.php')
->direct($uri, $method);

