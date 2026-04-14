<?php

namespace App\Services\InformationTechnologyMajors;

use App\Repositories\InformationTechnologyMajorsRepository;
use App\Services\InformationTechnologyMajors\InformationTechnologyMajorsInterface;
use Illuminate\Http\Request;
/**
 * Class UserService$this->
 *
 * @package App\Services
 */
class InformationTechnologyMajorsService implements InformationTechnologyMajorsInterface
{
    protected $iTechInterface;
    public function __construct(InformationTechnologyMajorsRepository $iTechInterface)
   {
      $this->iTechInterface = $iTechInterface;
   }
   public function getITechnologyList($params){        
        $data =$this->iTechInterface->index($params);
        return $data; 
   }
   public function getITechnologyById($id){        
        return $this->iTechInterface->edit($id);
   }
   public function getITechnologyCreate($params){         
        return $this->iTechInterface->create($params);
   }
   public function getITechnologyUpdate($params, $id){        
        return $this->iTechInterface->update($params, $id);        
   }
   public function getITechnologyDelete($id){       
        return $this->iTechInterface->delete($id);    
   }
}