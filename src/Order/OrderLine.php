<?php

namespace App\Order;

use App\Product;
use App\ValueObject\Money;

class OrderLine{

    public function __construct(
        public Product $product,
        public int $amount,    
        public Money $price    
        )
    {
        //
    }

    public function changeAmount(int $amount) : OrderLine
    {
        return new OrderLine($this->product, $this->amount =$amount, $this->price);
    }

    public function changePrice(Money $price) : OrderLine
    {
        return new OrderLine($this->product, $this->amount, $this->price=$price);
    }
        
}