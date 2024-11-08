<?php

namespace App\Repository;

use App\Product\Product;

interface ProductRepositoryInterface
{
    public function get(int $productID) : ?Product;



}