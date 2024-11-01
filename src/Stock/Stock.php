<?php
declare(strict_types=1);

namespace App\Stock;

use Exception;

class Stock
{
    private array $stock = [];

    public function __construct(
        readonly public string $name
    )
    {
        //
    }

    public function addProduct(StockItem $stockItem) : Stock
    {
        // if exists product in stock update amount
        if ($this->hasProductByName($stockItem->product->name)) {
            $this->stock[$stockItem->product->name]->amount += $stockItem->amount;

            return $this;
        }

        $this->stock[$stockItem->product->name] = $stockItem;

        return $this;

    }

    public function count() : int
    {
       return count($this->stock);
    }

    public function countByProduct(string $string) : int
    {
        return $this->stock[$string]->amount;
    }


    public function hasProductByName(string $string) : bool
    {
        return isset($this->stock[$string]);
    }

    /**
     * @throws Exception
     */
    public function get(string $string, int $int) : array
    {
        // Validate if product exists
        if (!$this->hasProductByName($string)) {
            throw new Exception('Product not found');
        }

        // Validate if amount is enough
        if ($this->stock[$string]->amount < $int) {
            throw new Exception('Not enough amount');
        }

        $collection = [
            'product' => $this->stock[$string]->product,
            'amount' => $int
        ];

        $amount = $this->stock[$string]->amount;

        if ($amount === $int) {
            unset($this->stock[$string]);
            return $collection;
        }


        $this->stock[$string] = $this->stock[$string]->updateAmount($amount - $int);
        return $collection;
    }




}