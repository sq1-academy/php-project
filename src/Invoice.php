<?php
declare(strict_types=1);

namespace App;

use App\ValueObject\Money;
use App\Enum\Currency;

class Invoice
{
    private Client $client;
    private array $items = [];
    private Money $total;
    private string $paymentType;

    public function __construct(Client $client, Currency $currency, string $paymentType)
    {
        $this->client = $client;
        $this->total = new Money(0, $currency);
        $this->paymentType = $paymentType;
    }

    public function addItem(Product $product, int $quantity, Money $pricePerUnit): void
    {
        $totalPrice = $pricePerUnit->sum(new Money($quantity * $pricePerUnit->amount, $pricePerUnit->currency));
        $this->items[] = [
            'product' => $product,
            'quantity' => $quantity,
            'price_per_unit' => $pricePerUnit,
            'total_price' => $totalPrice,
        ];
        $this->total = $this->total->sum($totalPrice);
    }

    public function getTotal(): Money
    {
        return $this->total;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getClientName(): string
    {
        return $this->client->name;
    }

    public function getPaymentType(): string
    {
        return $this->paymentType;
    }
}
