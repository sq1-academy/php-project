<?php

namespace App;

use App\Stock\Stock;
use Exception;

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
     * 
     * @param Stock $stock
     * @throws Exception
     */
    public function process(Stock $stock): void
    {
        $productName = $this->product->name;
        $stockItem = $stock->get($productName, $this->amount);
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }
}
