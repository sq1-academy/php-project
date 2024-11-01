<?php

namespace App\Stock;

use App\Product;

readonly class StockItem
{

    public function __construct(
      public Product $product,
      public int $amount
    )
    {
        //
    }

    public function updateAmount(int $amount) : StockItem
    {
        return new StockItem($this->product, $amount);
    }

}