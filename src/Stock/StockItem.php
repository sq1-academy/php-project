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

    public function addAmount(int $amount) : StockItem
    {
        return new StockItem($this->product, $this->amount + $amount);
    }

    public function subtractAmount(int $amount) : StockItem
    {
        return new StockItem($this->product, $this->amount - $amount);
    }

}