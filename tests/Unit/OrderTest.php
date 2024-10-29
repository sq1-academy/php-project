<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use App\Client;
use App\Product;
use App\Order;

#[CoversClass(Order::class)]
class OrderTest extends TestCase
{
    public function test_want_to_buy_a_product() : void
    {
        $client = new Client(15969, 'Juan');
        $product = new Product('Arroz');

        $order = new Order(
            $client,
            $product,
            5
        );

        $this->assertEquals('Arroz', $order->getProduct()->name);



    }


}