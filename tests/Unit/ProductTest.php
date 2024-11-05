<?php

namespace App\Tests\Unit;

use App\Product;
use App\Enum\Currency;
use App\ValueObject\Money;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Product::class)]
class ProductTest extends TestCase
{
    public function test_create_product() : void
    {
        $price = new Money(2100, Currency::COP);

        $product = new Product('Arroz', $price);

        $this->assertEquals('Arroz', $product->name);

        $this->assertEquals($price, $product->getPrice());
    }

}