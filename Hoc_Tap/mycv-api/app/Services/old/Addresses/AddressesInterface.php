<?php 

namespace App\Services\Addresses;
use Illuminate\Http\Request;
interface AddressesInterface
{    
    public function getAddressesList($params);
    public function getAddressesById($id);
    public function getAddressesCreate($params);
    public function getAddressesUpdate($params, $id);
    public function getAddressesDelete($id);
}