<?php
declare(strict_types=1);

namespace App;

class Client
{
    public function __construct(
       readonly public string $identifier,
       readonly public string $name
    )
    {
        //
    }


}