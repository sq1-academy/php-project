<?php
declare(strict_types=1);

namespace App\Product;

readonly class Product
{
    public function __construct(
        public ProductID $productID,
        public string $name
    )
    {
        //
    }

    public function getIdentifier() : ProductID
    {
        return $this->productID;
    }

}