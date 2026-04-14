<?php

namespace App\Services\Districts;

use App\Models\Api\Provinces;
use App\Repositories\DistrictsRepository;
use App\Repositories\ProvincesRepository;
use App\Services\Districts\DistrictsInterface;
use Illuminate\Http\Request;

class DistrictsService implements DistrictsInterface
{
    protected $districtsRepository;
    protected $provincesRepository;
    public function __construct(DistrictsRepository $districtsRepository, ProvincesRepository $provincesRepository)
    {
        $this->districtsRepository = $districtsRepository;
        $this->provincesRepository = $provincesRepository;
    }
   public function getDistrictsList($params){        
        $data = $this->districtsRepository->index($params);
        return $data;
   }
   public function getDistrictsById($id){
        $data = $this->districtsRepository->edit($id);      
        return $data;
   }
   public function getDistrictsCreate($params){         
        $data = $this->districtsRepository->create($params);
        return $data;
   }
   public function getDistrictsUpdate($params, $id){             
        $data = $this->districtsRepository->update($params, $id);
        return $data;
   }
   public function getDistrictsDelete($id){       
    $data = $this->districtsRepository->delete($id);
    return $data;
   }

   public function getStoreDistrictsApi(){
        $data = $this->districtsRepository->getStoreDistrictsApi();
        return $data;
   }
}