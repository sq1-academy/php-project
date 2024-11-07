<?php
declare(strict_types=1);

namespace App\Product;

use App\Enum\Currency;
use App\ValueObject\Money;
use Exception;

readonly class Price extends Money
{
    /**
     * @throws Exception
     */
    public function __construct(
        int $amount,
        Currency $currency
    )
    {
        parent::__construct($amount, $currency);
        $this->validateNonNegativeValues();

    }

    public function show() : float
    {
        return $this->amount / 100;
    }

    /**
     * @throws Exception
     */
    private function validateNonNegativeValues() : void
    {
        if($this->amount < 0) {
            throw new Exception('Price can not be negative');
        }
    }




}