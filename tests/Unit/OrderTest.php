<?php

namespace App\Tests\Unit;

use App\Client;
use App\Enum\Currency;
use App\Order;
use App\Product\Product;
use App\Product\ProductID;
use App\Product\Price;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Order::class)]
#[UsesClass(Client::class)]
#[UsesClass(Product::class)]
class OrderTest extends TestCase
{
    public function test_want_to_buy_a_product() : void
    {
        $client = new Client(15969, 'Juan');
        $product = new Product( new ProductID('arr-59'), 'Arroz');

        $order = new Order(
            $client,
            $product,
            5
        );

        $this->assertEquals('Arroz', $order->getProduct()->name);



    }


}