<?php
namespace App\Tests\Unit;
use App\ClientShippingAddressManager;
use App\Client;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ClientShippingAddressManager::class)]
#[CoversClass(Client::class)]

class ClientShippingAddressManagerTest extends TestCase {

    
    public function testgetClient (): void
    {
        $client = new Client(1094, 'Juan',);
        $this->assertEquals('1094', $client->getClient()->id);
    }


    public function testAddAddress(): void 
    {
        $manager = new CustomerAddressManager();
        $this->assertTrue($manager->addAddress(1, '123 Main St', 'Anytown', 'CA', '12345'));
    }

    public function testGetAddresses(): void 
    {
        $manager = new CustomerAddressManager();
        $addresses = $manager->getAddresses(1);
        $this->assertIsArray($addresses);
        $this->assertContainsOnly('string', $addresses);
    }

    public function testRemoveAddress(): void 
    {
        $manager = new CustomerAddressManager();
        $this->assertTrue($manager->removeAddress(1, 1));
    }
}

?>