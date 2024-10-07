<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require "src/router.php";

$router = new Router;

$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);

$params = $router->match($path);

if ($params === false) {
    # code...
    exit("no route found");
}

// var_dump($params);
// exit;

// $segments = explode("/", $path);

// print_r($segments);
// exit;

// $action = $segments[2];
// $controller = $segments[1];

$action = $params["action"];
$controller = $params["controller"];

require "src/controllers/$controller.php";

$controller_object = new $controller;

$controller_object->$action();