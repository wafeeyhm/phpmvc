<?php

namespace Framework;

class Router{

    private array $routes = [];

    public function add(string $path, array $params):void {

        $this->routes[] = [
            "path" => $path,
            "params" => $params
        ];

    }

    public function match(string $path): array|bool{

        $pattern = "#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#";

        if(preg_match($pattern, $path, $matches)){

            $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);

            // print_r($matches);
            // exit("Match");

            return $matches;

        }

        /*
        foreach ($this->routes as $route) {
            # code...

            if ($route["path"] === $path) {
                # code...
                return $route["params"];
            }

        }
        */

        return false;

    }

}