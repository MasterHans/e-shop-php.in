<?php
namespace App\Components;

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

                // Получаем внутренний путь из внешнего согласно правилу.

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segments) . 'Controller');

                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;

                //Create object and execute method
                $controllerClassName = 'App\\Controllers\\' . $controllerName;
                $controllerObject = new $controllerClassName;
                //call controller action
                $result = call_user_func_array([$controllerObject, $actionName], $parameters);

//                if ($result != null) {
                break;
//                }

            }

        }

    }

}