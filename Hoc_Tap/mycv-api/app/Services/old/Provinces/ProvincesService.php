<?php

namespace App\Services\Provinces;
use Illuminate\Http\Request;
use App\Repositories\ProvincesRepository;
use App\Services\Provinces\ProvincesInterface;
use App\Models\Api\Provinces;

/**
 * Class UserService
 *
 * @package App\Services
 */
class ProvincesService implements ProvincesInterface
{    
    protected $provincesRepository;
    public function __construct(ProvincesRepository $provincesRepository)
   {
       $this->provincesRepository = $provincesRepository;
   }

   public function getApiDataList(){
       return $this->provincesRepository->getApiDataList();
        
   }

   public function getProvincesList($params){        
        return $this->provincesRepository->index($params);        
   }
   public function getProvincesById($id){        
        return  $this->provincesRepository->edit($id);        
   }
   public function getProvincesCreate($params){         
        return $this->provincesRepository->create($params);
   }
   public function getProvincesUpdate($params, $id){        
        return $this->provincesRepository->update($params, $id);        
   }
   public function getProvincesDelete($id){ 
        return $this->provincesRepository->delete($id);    
   }
}