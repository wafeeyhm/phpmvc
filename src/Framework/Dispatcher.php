<?php

namespace Framework;

use ReflectionMethod;

class Dispatcher{

    public function __construct(private Router $router)
    {
        
    }

    public function handle(string $path){

        $params = $this->router->match($path);

        // print_r($params);

        if ($params === false) {
            # code...
            exit("no route found");
        }

        $action = $params["action"];
        $controller = "App\Controllers\\" .ucwords($params["controller"]);

        $controller_object = new $controller;

        $args = $this->getActionArguments($controller, $action, $params);

        $controller_object->$action(...$args);
    }

    private function getActionArguments(string $controller, string $action, array $params): array{
        
        $args = [];
        
        //reflector
        $method = new ReflectionMethod($controller, $action);

        foreach ($method->getParameters() as $parameter) {
            # code...
            $name = $parameter->getName();

            $args[$name] = $params[$name];
        }

        // print_r($args);

        return $args;

    }

}