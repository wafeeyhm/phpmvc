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

        $action = $this->getActionName($params);
        $controller = $this->getControllerName($params);

        $controller_object = $this->getObject($controller);

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

    private function getObject(string $class_name): object
    {
        $reflector = new ReflectionClass($class_name);

        $constructor = $reflector->getConstructor();

        $dependencies = [];

        if ($constructor === null) {
            # code...

            return new $class_name;
        
        }

        foreach ($constructor->getParameters() as $parameter) {
            # code...
            $type = (string) $parameter->getType();

            $dependencies[] = $this->getObject($type);
        }

        return new $class_name(...$dependencies);
    }

}