<?php

namespace App;

use App\Enum\OrderStatus;

class Order
{
    public function __construct(
        private Client $client,
        private Product $product,
        private int $amount,
        private OrderStatus $status
    )
    {
        //
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getStatus(): OrderStatus{
        return $this->status;
    }

    /**
     * @param OrderStatus $status
     */

    public function setStatus(OrderStatus $status): void
    {
        $this->status = $status;
    }

}