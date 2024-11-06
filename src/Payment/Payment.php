<?php

namespace Payment;

class Payment
{
    private readonly Order $order;
    private readonly Money $money;
    private readonly string $paymentType;
    private string $state;

    public function __construct($order, $money, $paymentType)
    {
        $this->order = $order;
        $this->money = $money;
        $this->paymentType  = $paymentType;
        $this->state = 'pending';
    }

    public function accept()
    {
        if ($this->state === 'pending') {
            $this->state = 'accepted';
        }
    }

    public function decline()
    {
        if ($this->state === 'pending') {
            $this->state = 'declined';
        }
    }

    public function getState()
    {
        return $this->state;
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function getPaymentType()
    {
        return $this->paymentType;
    }
}

?>