<?php

declare(strict_types=1);

namespace App\Controllers;

use \App\Models\Product;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;

class Products extends Controller{

    public function __construct(private Product $model)
    {
        
    }

    private function getProduct(string $id): array
    {
        $product = $this->model->find($id);

        if ($product === false) {
            # code...
            throw new PageNotFoundException("Product not found");
        }

        return $product;
    }

    public function index(){

        $products = $this->model->findAll();

        echo $this->viewer->render("shared/header.php",[
            "title" => "Products"
        ]);

        echo $this->viewer->render("Products/index.php", [
            "products" => $products,
            "total" => $this->model->getTotal()
        ]);

        echo $this->viewer->render("shared/footer.php");
    }

    public function show(string $id){

        $product = $this->getProduct($id);

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
            "name" => $this->request->post["name"],
            "description" => empty($this->request->post["description"]) ? null : $this->request->post["description"],
        ];

        if($this->model->insert($data)){

            header("Location: /products/{$this->model->getInsertID()}/show");
            exit;

        } else {

            echo $this->viewer->render("shared/header.php",[
                "title" => "New Product"
            ]);
    
            echo $this->viewer->render("Products/new.php",[
                "errors" => $this->model->getErrors(),
                "product" => $data
            ]);
    
            echo $this->viewer->render("shared/footer.php");

        }
    }

    public function edit(string $id){

        $product = $this->getProduct($id);

        echo $this->viewer->render("shared/header.php",[
            "title" => "Edit Product"
        ]);

        echo $this->viewer->render("Products/edit.php", [
            "product" => $product
        ]);

        echo $this->viewer->render("shared/footer.php");
    }

    public function update(string $id)
    {

        $product = $this->getProduct($id);

        $product["name"] = $this->request->post["name"];
        $product["description"] = empty($this->request->post["description"]) ? null : $this->request->post["description"];

        if($this->model->update($id, $product)){

            header("Location: /products/{$id}/show");
            exit;

        } else {

            echo $this->viewer->render("shared/header.php",[
                "title" => "Edit Product"
            ]);
    
            echo $this->viewer->render("Products/edit.php",[
                "errors" => $this->model->getErrors(),
                "product" => $product
            ]);
    
            echo $this->viewer->render("shared/footer.php");

        }
    }

    public function delete(string $id)
    {
        $product = $this->getProduct($id);

        echo $this->viewer->render("shared/header.php",[
            "title" => "Delete Product"
        ]);

        echo $this->viewer->render("Products/delete.php", [
            "product" => $product
        ]);

        echo $this->viewer->render("shared/footer.php");
    }

    public function destroy(string $id)
    {
        $product = $this->getProduct($id);

        $this->model->delete($id);

        header("Location: /products/index");
        exit;
    }

}