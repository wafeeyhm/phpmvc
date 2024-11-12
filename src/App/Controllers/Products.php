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

        echo $this->viewer->render("shared/footer.php");
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

        echo $this->viewer->render("shared/footer.php");
    }

    public function showPage(string $title, string $id, string $page){

        echo $title, " ", $id, " ", $page;

    }

    public function new()
    {
        echo $this->viewer->render("shared/header.php",[
            "title" => "New Product"
        ]);

        echo $this->viewer->render("Products/new.php");

        echo $this->viewer->render("shared/footer.php");
    }

    public function create()
    {
        $data = [
            "name" => $_POST["name"],
            "description" => empty($_POST["description"]) ? null : $_POST["description"],
        ];

        var_dump($this->model->insert($data));

        print_r($this->model->getErrors());
    }
}