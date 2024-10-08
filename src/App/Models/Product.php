<?php

namespace App\Models;

use PDO; // Importing the PDO class from the global namespace

class Product {

    public function getData(): array
    {
        // You can directly use 'PDO' because of the 'use' statement
        $dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306";
   
        $pdo = new PDO($dsn, "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $stmt = $pdo->query("SELECT * FROM product");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
