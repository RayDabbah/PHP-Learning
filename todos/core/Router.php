<?php
class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];
    public static function get($file)
    {
        $router = new static;
        require $file;
        return $router;
    }
    public function define($routes)
    {
        $this->routes = $routes;
    }
    public function getReq($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }
    public function postReq($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }
    public function direct($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->routes[$method][$uri];
        }
        throw new Exception('No route defined for this URI');
    }
}
