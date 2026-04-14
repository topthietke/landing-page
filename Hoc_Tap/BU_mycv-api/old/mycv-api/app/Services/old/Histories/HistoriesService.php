<?php

namespace App\Services\Histories;
use Illuminate\Http\Request;
use App\Repositories\HistoriesRepository;
use App\Services\Histories\HistoriesInterface;

/**
 * Class UserService
 *
 * @package App\Services
 */
class HistoriesService implements HistoriesInterface
{
    protected $historiesRepository;
    public function __construct(HistoriesRepository $historiesRepository)
   {
       $this->historiesRepository = $historiesRepository;
   }
   public function getHistoriesList($params){        
        $data = $this->historiesRepository->index($params);
        return $data;
   }
   public function getHistoriesById($id){        
        $data = $this->historiesRepository->edit($id);  
        return  $data;
   }
   public function getHistoriesCreate($params){ 
        
        $data = $this->historiesRepository->create($params);
        return $data;
   }
   public function getHistoriesUpdate($params, $id){             
        $data = $this->historiesRepository->update($params, $id);
        return $data;
   }
   public function getHistoriesDelete($id){   
    
    $data = $this->historiesRepository->delete($id);
    return $data;
   }
}