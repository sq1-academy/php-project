<?php
declare(strict_types=1);

namespace App\Product;

readonly class ProductID
{
    public function __construct(
        public string $identifier
    )
    {
        //
    }

}