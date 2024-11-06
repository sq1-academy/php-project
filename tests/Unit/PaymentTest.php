

<?php

namespace Tests\Unit;

use App\Payment\Payment;
use App\Order;
use App\Money;

use PHPUnit\Framework\TestCase;

class PaymentTest extends TestCase
{
    public function testAcceptPayment()
    {
        $order = $this->createMock(Order::class);
        $money = $this->createMock(Money::class);
        $payment = new Payment($order, $money, 'credit_card');

        $payment->accept();

        $this->assertEquals('accepted', $payment->getState());
    }

    public function testDeclinePayment()
    {
        $order = $this->createMock(Order::class);
        $money = $this->createMock(Money::class);
        $payment = new Payment($order, $money, 'credit_card');

        $payment->decline();

        $this->assertEquals('declined', $payment->getState());
    }

    public function testGetMoney()
    {
        $order = $this->createMock(Order::class);
        $money = $this->createMock(Money::class);
        $payment = new Payment($order, $money, 'credit_card');

        $this->assertSame($money, $payment->getMoney());
    }

    public function testGetPaymentType()
    {
        $order = $this->createMock(Order::class);
        $money = $this->createMock(Money::class);
        $payment = new Payment($order, $money, 'credit_card');

        $this->assertEquals('credit_card', $payment->getPaymentType());
    }

    public function testInitialStateIsPending()
    {
        $order = $this->createMock(Order::class);
        $money = $this->createMock(Money::class);
        $payment = new Payment($order, $money, 'credit_card');

        $this->assertEquals('pending', $payment->getState());
    }
}
?>