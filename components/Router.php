<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include __DIR__ . '/../config/routes.php';
    }

    public function run()
    {
        //1. Get request string
        $uri = !empty(trim($_SERVER['REQUEST_URI'], '/')) ? trim($_SERVER['REQUEST_URI'], '/') : '';

        //2. Find request string in array $routes
        foreach ($this->routes as $uriPattern => $path) {
            //3. Compare $uriPattern and $uri
            if (preg_match('`')) {

            }

        }

    }

}