<?php

namespace App\Tests\Unit\ValueObject;

use App\Enum\Currency;
use App\ValueObject\Money;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Money::class)]
class MoneyTest extends TestCase
{
    public function test_create_money(): void
    {
        $money = new Money(1000, Currency::COP);
        $this->assertEquals(1000, $money->amount);
        $this->assertEquals(Currency::COP, $money->currency);
    }

    public function test_sum_money_should_be_return_new_money(): void
    {
        $money1 = new Money(1000, Currency::COP);
        $money2 = new Money(2000, Currency::COP);

        $sum = $money1->sum($money2);

        $this->assertEquals(3000, $sum->amount);
        $this->assertEquals(Currency::COP, $sum->currency);
    }

    public function test_subtract_money_should_be_return_new_money(): void
    {
        $money1 = new Money(1000, Currency::COP);
        $money2 = new Money(2000, Currency::COP);

        $sum = $money1->subtract($money2);

        $this->assertEquals(-1000, $sum->amount);
        $this->assertEquals(Currency::COP, $sum->currency);
    }

    public function test_try_sum_money_with_different_currency(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Currencies must be the same');

        $money1 = new Money(1000, Currency::COP);
        $money2 = new Money(2000, Currency::USD);

        $money1->sum($money2);

    }

}