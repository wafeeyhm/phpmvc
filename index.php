<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

spl_autoload_register(function(string $class_name){
    
    require "src/" . str_replace("\\", "/", $class_name) . ".php";

});

$router = new Framework\Router;

// $router->add("/{controller}/{action}");
$router->add("/products/{slug:[\w-]+}", ["controller" => "products", "action" => "show"]);
$router->add("/{controller}/{id:\d+}/{action}");
$router->add("/home/index" , ["controller" => "home", "action" => "index"]);
$router->add("/products" , ["controller" => "products", "action" => "index"]);
$router->add("/" , ["controller" => "home", "action" => "index"]);

$params = $router->match($path);

// print_r($params);

if ($params === false) {
    # code...
    exit("no route found");
}

$action = $params["action"];
$controller = "App\Controllers\\" .ucwords($params["controller"]);

$controller_object = new $controller;

$controller_object->$action();