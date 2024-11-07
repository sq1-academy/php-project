<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use App\Client;
use App\Product;
use App\Order;
use App\Stock\Stock;
use App\Stock\StockItem;
use Exception;

#[CoversClass(Order::class)]
#[UsesClass(Client::class)]
#[UsesClass(Product::class)]
#[UsesClass(Stock::class)]
#[UsesClass(StockItem::class)]
class OrderTest extends TestCase
{
    public function test_want_to_buy_a_product() : void
    {
        $client = new Client(15969, 'Juan');
        $product = new Product('Arroz');
        
        $stock = new Stock('Warehouse 1');
        $stock->addProduct(new StockItem($product, 10));

        $order = new Order($client, $product, 5);

        $order->process($stock);

        $this->assertEquals(5, $stock->countByProduct('Arroz'), 'Stock should be reduced by 5 after processing the order');
    }

    public function test_insufficient_stock_for_order() : void
    {
        $client = new Client(15969, 'Juan');
        $product = new Product('Arroz');
        
        $stock = new Stock('Warehouse 1');
        $stock->addProduct(new StockItem($product, 3));

        $order = new Order($client, $product, 5);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Not enough amount');
        
        $order->process($stock);
    }

    public function test_no_stock_for_product() : void
    {
        $client = new Client(15969, 'Juan');
        $product = new Product('Arroz');
        
        $stock = new Stock('Warehouse 1');

        $order = new Order($client, $product, 5);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Product not found');
        
        $order->process($stock);
    }
}
