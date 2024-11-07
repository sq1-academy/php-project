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

    public function addProduct(StockItem $stockItem): Stock
    {
        if ($this->hasProductByName($stockItem->product->name)) {
            $this->stock[$stockItem->product->name] = $this->stock[$stockItem->product->name]->addAmount($stockItem->amount);
            return $this;
        }

        $this->stock[$stockItem->product->name] = $stockItem;
        return $this;
    }

    public function count(): int
    {
        return count($this->stock);
    }

    public function countByProduct(string $string): int
    {
        return $this->stock[$string]->amount ?? 0;
    }

    public function hasProductByName(string $string): bool
    {
        return isset($this->stock[$string]);
    }

    /**
     * @throws Exception
     */
    public function get(string $string, int $int): array
    {
        if (!$this->hasProductByName($string)) {
            throw new Exception('Product not found');
        }

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

        $this->stock[$string] = $this->stock[$string]->subtractAmount($int);
        return $collection;
    }
}
