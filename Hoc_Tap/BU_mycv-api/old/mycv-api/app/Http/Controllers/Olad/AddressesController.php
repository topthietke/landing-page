<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Addresses\AddressesInterface;
class AddressesController extends Controller
{
    private $addressesInterface;
    public function __construct(AddressesInterface $addressesInterface){
        $this->addressesInterface = $addressesInterface;
    }
    public function index(Request $request)
    {  
        $params = $request -> all();   
        return $this->responseData($this->addressesInterface->getAddressesList($params));
    }
    public function edit($id)
    {             
        return $this->responseData($this->addressesInterface->getAddressesById($id));
    }
    public function create(Request $request)
    { 
        $params = $request -> all();      
        return $this->responseData($this->addressesInterface->getAddressesCreate($params));
    }
    public function update(Request $request, $id)
    { 
        $params = $request -> all();       
        return $this->responseData($this->addressesInterface->getAddressesUpdate($params, $id));
    }
    
    public function delete($id)
    {            
        return $this->responseData($this->addressesInterface->getAddressesDelete($id));
    }

}
