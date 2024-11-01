<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use App\Client;

#[CoversClass(Client::class)]
class ClientTest extends TestCase
{
    public function test_create_client()
    {
        $client = new Client(1094, 'Juan',);

        $this->assertEquals(1094,  $client->identifier);
        $this->assertEquals('Juan', $client->name);

    }


}