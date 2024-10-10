<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

spl_autoload_register(function(string $class_name) {
    $file = "src/" . str_replace("\\", "/", $class_name) . ".php";
    echo "Trying to load: $file\n"; // Debugging output
    
    if (file_exists($file)) {
        require $file;
    } else {
        exit("Class file $file not found.");
    }
});


$router = new Framework\Router;

$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "products", "action" => "showPage"]);
$router->add("/products/{slug:[\w-]+}", ["controller" => "products", "action" => "show"]);
$router->add("/{controller}/{id:\d+}/{action}");
$router->add("/home/index" , ["controller" => "home", "action" => "index"]);
$router->add("/products" , ["controller" => "products", "action" => "index"]);
$router->add("/" , ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}");

$dispatcher = new Framework\Dispatcher($router);

$dispatcher->handle($path);