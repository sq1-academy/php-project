<?php

namespace App\Repository;

use App\Product\Product;
use App\Product\ProductID;

class MemoryProductRopository implements ProductRepositoryInterface
{
    public function get(int $productID): ?Product
    {
        return new Product(
            new ProductID('product-id'),
            'Product Name'
        );
    }
}