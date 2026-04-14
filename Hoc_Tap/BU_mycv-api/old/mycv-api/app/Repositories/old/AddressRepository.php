<?php

namespace App\Repositories;

use App\Models\Address;

class AddressRepository
{
    private $address;
    public function __construct(Address $address)
    {        
        $this->address = $address;
    }
}