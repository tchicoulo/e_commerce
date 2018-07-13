<?php
require_once 'routes.php';

// Default timezone setup
date_default_timezone_set('Europe/Paris');

// getting server infos
$app= __DIR__;
$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$route= new Route();

// getting router infos
$action      = $route->getAction();
$args        = $route->getArgs();
$controllers = $route->getController();  // this function include the corresponding controller
?>
