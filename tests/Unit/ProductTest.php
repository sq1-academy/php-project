<?php

namespace App\Tests\Unit;

use App\Product;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Product::class)]
class ProductTest extends TestCase
{
    public function test_create_product() : void
    {
        $product = new Product('Arroz');

        $this->assertEquals('Arroz', $product->name);
    }

}