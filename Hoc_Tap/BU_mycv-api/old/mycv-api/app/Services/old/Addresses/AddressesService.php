<?php

namespace App\Services\Addresses;

use App\Repositories\AddressesRepository;
use App\Services\Addresses\AddressesInterface;
use Illuminate\Http\Request;
/**
 * Class UserService$this->
 *
 * @package App\Services
 */
class AddressesService implements AddressesInterface
{
    protected $AddressesRepository;
    public function __construct(AddressesRepository $AddressesRepository)
   {
       $this->AddressesRepository = $AddressesRepository;
   }
   public function getAddressesList($params){        
     $data = $this->AddressesRepository->index($params);       
     return $data;
   }
   public function getAddressesById($id){        
     $data = $this->AddressesRepository->edit($id);
     return $data;
   }
   public function getAddressesCreate($params){         
     $data = $this->AddressesRepository->create($params);
     return $data;
   }
   public function getAddressesUpdate($params, $id){        
     $data = $this->AddressesRepository->update($params, $id);
     return $data;
   }
   public function getAddressesDelete($id){       
     $data = $this->AddressesRepository->delete($id);
     return $data;
   
   }
}