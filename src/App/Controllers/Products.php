<?php

declare(strict_types=1);

namespace App\Controllers;

use \App\Models\Product;
use Framework\Exceptions\PageNotFoundException;
use Framework\Viewer;

class Products{

    public function __construct(private Viewer $viewer, private Product $model)
    {
        
    }

    public function index(){

        $products = $this->model->findAll();

        echo $this->viewer->render("shared/header.php",[
            "title" => "Products"
        ]);

        echo $this->viewer->render("Products/index.php", [
            "products" => $products
        ]);
    }

    public function show(string $id){

        $product = $this->model->find($id);

        if ($product === false) {
            # code...
            throw new PageNotFoundException("Product not found");
        }

        echo $this->viewer->render("shared/header.php",[
            "title" => "Products"
        ]);

        echo $this->viewer->render("Products/show.php", [
            "product" => $product
        ]);
    }

    public function showPage(string $title, string $id, string $page){

        echo $title, " ", $id, " ", $page;

    }
}