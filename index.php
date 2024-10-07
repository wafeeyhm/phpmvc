<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$segments = explode("/", $path);

// print_r($segments);
// exit;

$action = $segments[2];
$controller = $segments[1];

require "src/controllers/$controller.php";

$controller_object = new $controller;

$controller_object->$action();