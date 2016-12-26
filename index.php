<?php
//FRONT CONTROLLER

//1. Common settings
// Display ALL errors, warnings etc
ini_set('display_errors', 1);
error_reporting(E_ALL);

//2. Import systems files
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Router.php');

//3. Connect to DataBAse

//4. Run Router
$router = new Router();
$router->run();