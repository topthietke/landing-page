<?php

namespace App\Services\CareerGoals;

use App\Repositories\CareerGoalsRepository;
use App\Services\CareerGoals\CareerGoalsInterface;
use Illuminate\Http\Request;
/**
 * Class UserService$this->
 *
 * @package App\Services
 */
class CareerGoalsService implements CareerGoalsInterface
{
    protected $careerGoalsRepository;
    public function __construct(CareerGoalsRepository $careerGoalsRepository)
   {
       $this->careerGoalsRepository = $careerGoalsRepository;
   }
   public function getCareerGoalsList($params){        
        return $this->careerGoalsRepository->index($params);
   }
   public function getCareerGoalsById($id){        
        return $this->careerGoalsRepository->edit($id);
   }
   public function getCareerGoalsCreate($params){         
       return $this->careerGoalsRepository->create($params);
   }
   public function getCareerGoalsUpdate($params, $id){
        return $this->careerGoalsRepository->update($params, $id);
        
   }
   public function getCareerGoalsDelete($id){       
    return $this->careerGoalsRepository->delete($id);   
   }
}