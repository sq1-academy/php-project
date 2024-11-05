<?php

namespace App\Tests\Unit;

use App\Order\OrderLine;
use App\ValueObject\Money;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use App\Client;
use App\Product;
use App\Order;

#[CoversClass(Order::class)]
#[UsesClass(Client::class)]
#[UsesClass(Product::class)]
class OrderTest extends TestCase
{
    public function test_want_to_buy_a_product() : void
    {
        $client = new Client(15969, 'Juan');
        $product = new Product('Arroz');

        $order = new Order(
            $client,
        );

        $order ->addLine(orderLine: new OrderLine($product,5,new Money(1234,new Currency('COP'))));

        $this->assertEquals('Arroz', $order->getProduct()->name);

    }
}