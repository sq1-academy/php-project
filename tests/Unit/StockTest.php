<?php

namespace App\Tests\Unit;

use App\Product;
use App\Stock\Stock;
use App\Stock\StockItem;
use Exception;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Stock::class)]
#[CoversClass(StockItem::class)]
#[UsesClass(Product::class)]
class StockTest extends TestCase
{
    private Stock $stock;

    protected function setUp(): void
    {
        $this->stock = new Stock('Test General Stock');

        parent::setUp();
    }

    public function test_add_product_to_stock() : void
    {
        $this->stock
            ->addProduct(new StockItem(new Product('Arroz'), 5))
            ->addProduct(new StockItem(new Product('Frijoles'), 10));

        $this->assertEquals(2, $this->stock->count());
    }

    public function test_add_product_to_stock_with_same_product() : void
    {
            $this->stock
            ->addProduct(new StockItem(new Product('Arroz'), 5))
            ->addProduct(new StockItem(new Product('Arroz'), 10));

        $this->assertEquals(15, $this->stock->countByProduct('Arroz'));
        $this->assertEquals(1, $this->stock->count());
    }


    public function test_validate_if_exist_product_in_stock() : void
    {
        $product = new Product('Azucar');
        $stockItem = new StockItem($product, 6);

        $this->stock->addProduct($stockItem);

        $this->assertTrue($this->stock->hasProductByName('Azucar'));
    }

    public function test_not_exist_product_in_stock() : void
    {
        $this->assertFalse($this->stock->hasProductByName('Lentejas'));
    }

    public function test_get_product_from_stock() : void
    {
        $this->stock
            ->addProduct(new StockItem(new Product('Arroz'), 5))
            ->addProduct(new StockItem(new Product('Frijoles'), 10));

        $products =  $this->stock->get('Arroz', 2);

        $this->assertEquals(2, $products['amount']);
        $this->assertEquals(3, $this->stock->countByProduct('Arroz'));
    }

    public function test_get_product_from_stock_with_different_amount() : void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Not enough amount');

        $this->stock
            ->addProduct(new StockItem(new Product('Arroz'), 5));

        $this->stock->get('Arroz', 7);
    }

    public function test_get_product_from_stock_with_same_amount() : void
    {
        $this->stock
            ->addProduct(new StockItem(new Product('Frijoles'), 10));

        $this->stock->get('Frijoles', 10);

        $this->assertEquals(0, $this->stock->countByProduct('Frijoles'));
    }

    public function test_get_product_from_stock_with_different_product() : void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Product not found');

        $this->stock
            ->addProduct(new StockItem(new Product('Arroz'), 5));

        $this->stock->get('Frijoles', 10);
    }

}