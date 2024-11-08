<?php

namespace App\Repository;

use App\Product\Product;
use App\Product\ProductID;
use Illuminate\Database\Capsule\Manager as DB;

class MysqlProductRepository implements ProductRepositoryInterface
{
    public function get(int $productID): ?Product
    {
        $rawProduct = DB::table('product')->first($productID);

        if(!$rawProduct) {
            return null;
        }

        return  new Product(
            new ProductID($rawProduct->id),
            $rawProduct->name
        );
    }
}