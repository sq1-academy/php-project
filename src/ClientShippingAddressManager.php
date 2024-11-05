<?php

class ClientShippingAddressManager {
    
    public function getClient($id) {
        if (array_key_exists($id, $this->customers)) {
            return $this->customers[$id];
        }
        return null;
    }


    public function addAddress($clientId, $address, $city, $state, $zipCode) {
        $client = $this->getCustomer($clientId);
        if ($client) {
            $client->addAddress($address, $city, $state, $zipCode);
            return true;
        }
        return false;
    }


    public function getAddresses($clientId) {
        $client = $this->getCustomer($clientId);
        if ($client) {
            return $client->getAddresses();
        }
        return [];
    }

    public function removeAddress($clientId, $addressId) {
        $client = $this->getCustomer($clientId);
        if ($client) {
            $addresses = $client->getAddresses();
            if (array_key_exists($addressId, $addresses)) {
                unset($addresses[$addressId]);
                $client->addresses = array_values($addresses);
                return true;
            }
        }
        return false;
    }
}



?>
