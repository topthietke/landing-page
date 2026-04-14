<?php

namespace App\Services\CategoriesDetails;

use App\Repositories\CategoriesDetailsRepository;
use App\Services\CategoriesDetails\CategoriesDetailsInterface;
use Illuminate\Http\Request;
/**
 * Class UserService$this->
 *
 * @package App\Services
 */
class CategoriesDetailsService implements CategoriesDetailsInterface
{
    protected $CategoriesDetailsRepository;
    public function __construct(CategoriesDetailsRepository $CategoriesDetailsRepository)
   {
       $this->CategoriesDetailsRepository = $CategoriesDetailsRepository;
   }
   public function getCategoriesDetailsList($params){        
        $data = $this->CategoriesDetailsRepository->index($params);
        return $data;
   }
   public function getCategoriesDetailsById($id){        
        $data = $this->CategoriesDetailsRepository->edit($id);
        return $data;
   }
   public function getCategoriesDetailsCreate($params){             
        $data = $this->CategoriesDetailsRepository->create($params);
        return $data;
   }
   public function getCategoriesDetailsUpdate($params, $id){            
        $data = $this->CategoriesDetailsRepository->update($params, $id);
        return $data;    
   }
   public function getCategoriesDetailsDelete($id){       
        $data = $this->CategoriesDetailsRepository->delete($id);
        return $data;
   }
}