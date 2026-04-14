<?php

namespace App\Services\Categories;
use Illuminate\Http\Request;
use App\Repositories\CategoriesRepository;
use App\Services\Categories\CategoriesInterface;

/**
 * Class UserService
 *
 * @package App\Services
 */
class CategoriesService implements CategoriesInterface
{
    protected $categoriesRepository;
    public function __construct(CategoriesRepository $categoriesRepository)
   {
       $this->categoriesRepository = $categoriesRepository;
   }
   public function getCategoriesList($params){            
        
        $data = $this->categoriesRepository->index($params);        
        return $data;
   }
   public function getCategoriesById($id){        
        $data = $this->categoriesRepository->edit($id);
        return $data;
   }
   public function getCategoriesCreate($params){      
        $data =  $this->categoriesRepository->create($params);   
        return $data;           
   }
   public function getCategoriesUpdate($params, $id){
        
        $data = $this->categoriesRepository->update($params, $id);
        return $data;
   }
   public function getCategoriesDelete($id){    
        $data = $this->categoriesRepository->delete($id);
        return $data;
   }
}