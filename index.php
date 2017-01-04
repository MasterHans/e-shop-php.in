<?php
use App\Components\Router;
use App\Components\View;

//FRONT CONTROLLER

//1. Common settings
// Display ALL errors, warnings etc
ini_set('display_errors', 1);
error_reporting(E_ALL);

//2. Import systems files
require_once __DIR__ . '/autoload.php';

//3. Connect to DataBAse

//4. Run Router
try {
    $router = new Router();
    $router->run();
} catch (Exception $e) {
    $error = new View();
    $error->error = $e->getMessage();
    $error->display('errors/403.php');
    die;

}