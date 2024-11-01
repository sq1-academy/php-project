<?php
declare(strict_types=1);

namespace App\ValueObject;

use App\Enum\Currency;
use InvalidArgumentException;

readonly class Money
{
    public function __construct(
        public int      $amount,
        public Currency $currency
    )
    {
        //
    }

    public function sum(Money $money) : Money
    {
        $this->validateCurrency($money->currency);

        return new Money($this->amount + $money->amount, $this->currency);
    }

   public function subtract(Money $money) : Money
   {
       $this->validateCurrency($money->currency);

       return new Money($this->amount - $money->amount, $this->currency);
   }

   private function validateCurrency(Currency $currency) : void
   {
       if ($this->currency !== $currency) {
           throw new InvalidArgumentException('Currencies must be the same');
       }
   }

}