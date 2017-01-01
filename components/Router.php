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
            if (preg_match("~$uriPattern~", $uri)) {
                $segments = explode('/', $path);
                $controllerName = ucfirst(array_shift($segments) . 'Controller');

                $actionName = 'action' . ucfirst(array_shift($segments));

                //import controller class file
                $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once $controllerFile;
                }

                //Create object and execute method
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();

                if ($result != null) {
                    break;
                }

//                echo 'Controller Name = ' . $controllerName . '<br>';
//                echo 'Action Name = ' . $actionName . '<br>';
            }

        }

    }

}