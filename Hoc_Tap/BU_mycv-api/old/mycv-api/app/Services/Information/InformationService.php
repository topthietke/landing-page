<?php

namespace App\Services\Information;
use Illuminate\Http\Request;
use App\Repositories\InformationRepository;
use App\Services\Information\InformationInterface;


/**
 * Class UserService
 *
 * @package App\Services
 */
class InformationService implements InformationInterface
{
    protected $informationRepository;
    public function __construct(InformationRepository $informationRepository)
   {
       $this->informationRepository = $informationRepository;
   }
   public function getInformationList($params){        
        $data = $this->informationRepository->index($params);
        return $data;
   }
   public function getInformationById($id){        
        $data = $this->informationRepository->edit($id);
        return $data ;
   }
   public function getInformationCreate($params){        
        $data = $this->informationRepository->create($params); 
        return $data;    
   }
   public function getInformationUpdate($params, $id){        
        $data = $this->informationRepository->update($params, $id);
        return $data;
   }
   public function getInformationDelete($id){       
        $data = $this->informationRepository->delete($id);
        return $data;
   }
}