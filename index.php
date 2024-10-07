<?php

    $action = $_GET["action"];
    $controller = $_GET['controller'];

    if ($controller === "products") {
        # code...
        
        require "src/controllers/products.php";

        $controller_object = new Products;

    } elseif ($controller === "home") {
        # code...

        require "src/controllers/home.php";

        $controller_object = new Home;

    }

    if ($action === "index") {
        # code...
        $controller_object->index();
    } elseif ($action === "show") {
        # code...
        $controller_object->show();
    } else{
        $controller_object->index();
    }
    