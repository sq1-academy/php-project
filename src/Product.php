<?php

namespace App;

use App\ValueObject\Money;

class Product
{
    public function __construct(
        readonly public string $name,
        public Money $price
    )
    {
        //
    }

    public function getPrice(): Money
    {
        return $this->price;
    }
}