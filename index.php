<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

spl_autoload_register(function(string $class_name){
    
    require "src/" . str_replace("\\", "/", $class_name) . ".php";

});

$router = new Framework\Router;

$router->add("/{controller}/{action}");

$params = $router->match($path);

if ($params === false) {
    # code...
    exit("no route found");
}

$action = $params["action"];
$controller = "App\Controllers\\" .ucwords($params["controller"]);

$controller_object = new $controller;

$controller_object->$action();