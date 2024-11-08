<?php

namespace Framework;

use ReflectionMethod;
use ReflectionClass;

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

        // $action = $params["action"];
        $action = $this->getActionName($params);
        // $controller = "App\Controllers\\" .ucwords($params["controller"]);
        $controller = $this->getControllerName($params);

        //exit the script temporarily to print the value out
        // exit($controller);

        $reflector = new ReflectionClass($controller);

        $constructor = $reflector->getConstructor();

        $dependencies = [];

        if ($constructor !== null) {
            # code...

            foreach ($constructor->getParameters() as $parameter) {
                # code...
                $type = (string) $parameter->getType();

                $dependencies[] = new $type;
            }

        }

        $controller_object = new $controller(...$dependencies);

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

    private function getControllerName(array $params): string{

        $controller = $params["controller"];

        $controller = str_replace("-", "", ucwords(strtolower($controller), "-"));

        $namespace = "App\Controllers";

        if (array_key_exists("namespace", $params)) {
            # code...
            $namespace .= "\\" . $params["namespace"];
        }

        return $namespace . "\\" . $controller;

    }

    private function getActionName(array $params): string{

        $action = $params["action"];

        $action = lcfirst(str_replace("-", "", ucwords(strtolower($action), "-")));

        return $action;

    }

}