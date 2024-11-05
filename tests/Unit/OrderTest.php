<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;
use App\Client;
use App\Product;
use App\Order;
use App\Enum\OrderStatus;

#[CoversClass(Order::class)]
#[UsesClass(Client::class)]
#[UsesClass(Product::class)]
#[UsesClass(OrderStatus::class)]
class OrderTest extends TestCase
{
    private function test_create_order():Order
    {
        $client = new Client(15969, 'Juan');
        $product = new Product('Arroz');

        $order = new Order(
            $client,
            $product,
            5,
            OrderStatus::Pending
        );
        return $order;
    }

    public function test_want_to_buy_a_product() : void
    {
        $order = $this->test_create_order();

        $this->assertEquals('Arroz', $order->getProduct()->name);
    }

    public function test_order_pending() : void {
        $order = $this->test_create_order();
        $this->assertEquals('Pending', $order->getStatus()->value);
    }

    public function test_order_in_progress() : void {
        $order = $this->test_create_order();
        $order->setStatus(OrderStatus::InProgress);
        $this->assertEquals('In Progress', $order->getStatus()->value);
    }

    public function test_order_completed() : void {
        $order = $this->test_create_order();
        $order->setStatus(OrderStatus::Completed);
        $this->assertEquals('Completed', $order->getStatus()->value);
    }

    public function test_order_cancelled() : void {
        $order = $this->test_create_order();
        $order->setStatus(OrderStatus::Cancelled);
        $this->assertEquals('Cancelled', $order->getStatus()->value);
    }

    public function test_order_shipped() : void {
        $order = $this->test_create_order();
        $order->setStatus(OrderStatus::Shipped);
        $this->assertEquals('Shipped', $order->getStatus()->value);
    }

    public function test_order_delivered() : void {
        $order = $this->test_create_order();
        $order->setStatus(OrderStatus::Delivered);
        $this->assertEquals('Delivered', $order->getStatus()->value);
    }

    public function test_order_failed() : void {
        $order = $this->test_create_order();
        $order->setStatus(OrderStatus::Failed);
        $this->assertEquals('Failed', $order->getStatus()->value);
    }

}