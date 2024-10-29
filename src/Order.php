<?php

namespace App;

class Order
{
    public function __construct(
        private Client $client,
        private Product $product,
        private int $amount
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

}