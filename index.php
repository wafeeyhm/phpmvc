<?php

    require "src/controllers/products.php";
    $controller = new Products();

    $action = $_GET["action"];

    if ($action === "index") {
        # code...
        $controller->index();
    } elseif ($action === "show") {
        # code...
        $controller->show();
    } else{
        $controller->index();
    }
    