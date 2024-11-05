<?php

namespace App\Tests\Unit;

use App\Product\Product;
use App\Product\ProductID;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Product::class)]
#[CoversClass(ProductID::class)]
class ProductTest extends TestCase
{
    public function test_create_product_with_id() : void
    {
        $productID = new ProductID('mango-65869');

        $product = new Product($productID, 'Mango');

        $this->assertEquals($productID, $product->getIdentifier());

    }



}