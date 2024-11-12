<?php

declare(strict_types=1);

namespace App\Models;

use Framework\Model;

class Product extends Model
{

    // protected $table = "products";

    protected function validate(array $data): void
    {
        if (empty($data["name"])) {
            # code...
            $this->addError("name", "Name is required");
        }
    }

}