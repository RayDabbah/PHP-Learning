<?php
require 'core/bootstrap.php';

// $router = new Router;
// die(var_dump($_SERVER));
$uri = trim($_SERVER['REQUEST_URI'], '/');
require Router::get('routes.php')
->direct($uri);

