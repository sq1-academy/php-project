<?php
declare(strict_types=1);

namespace App\Tests\Unit\Product;

use App\Enum\Currency;
use App\Product\Price;
use Exception;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Price::class)]
class PriceTest extends TestCase
{
    public function test_price_non_negative_values() : void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Price can not be negative');

        new Price(-1, Currency::COP);
    }

    public function test_price_has_positive_values() : void
    {
        $price = new Price(1000, Currency::COP);

        $this->assertEquals(1000, $price->amount);
        $this->assertEquals(Currency::COP, $price->currency);
    }

    public function test_price_can_be_zero() : void
    {
        $price = new Price(0, Currency::EUR);

        $this->assertEquals(0, $price->amount);
    }

    public function test_price_show_with_decimal() : void
    {
        $price = new Price(20099, Currency::COP);

        $this->assertEquals(200.99, $price->show());
    }

    public function test_price_show_zero_value() : void
    {
        $price = new Price(0, Currency::COP);

        $this->assertEquals(0, $price->show());
    }


}