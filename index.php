<?php

declare(strict_types=1);

set_error_handler(function(
    int $errno,
    string $errstr,
    string $errfile,
    int $errline
): bool{
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

set_exception_handler(function (Throwable $exception){

    $show_errors = true;

    if ($show_errors) {
        # code...
        ini_set("display_errors", "1");
    } else {
        # code...
        ini_set("display_errors", "0");

        ini_set("log_errors", 1);

        // echo ini_get("error_log");

        require "views/500.php";
    }

    throw $exception;

});


$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if ($path === false) {
    # code...
    throw new UnexpectedValueException("Malformed URL: '{$_SERVER["REQUEST_URI"]}'");
}

spl_autoload_register(function (string $class_name) {

    require "src/" . str_replace("\\", "/", $class_name) . ".php";

});

$router = new Framework\Router;

$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "products", "action" => "showPage"]);
$router->add("/product/{slug:[\w-]+}", ["controller" => "products", "action" => "show"]);
$router->add("/{controller}/{id:\d+}/{action}");
$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}");

$container = new Framework\Container;

$container->set(App\Database::class, function(){
    return new App\Database("127.0.0.1", "product_db", "root", "");
});

$dispatcher = new Framework\Dispatcher($router, $container);

$dispatcher->handle($path);