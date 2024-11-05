<?php

namespace App\Order;

use App\Product;
use App\ValueObject\Money;

class OrderLine{

    public function __construct(
        private Product $product,
        private int $amount,    
        private Money $price    
        )
    {
        //
    }
        
}