<?php

namespace App\Services\TrainingProcesses;
use Illuminate\Http\Request;
use App\Repositories\TrainingProcessesRepository;
use App\Services\TrainingProcesses\TrainingProcessesInterface;

/**
 * Class UserService
 *
 * @package App\Services
 */
class TrainingProcessesService implements TrainingProcessesInterface
{
    protected $trainingProcessesRepository;
    public function __construct(TrainingProcessesRepository $trainingProcessesRepository)
   {
       $this->trainingProcessesRepository = $trainingProcessesRepository;
   }
   public function getTrainingProcessesList(array $params){        
        return $this->trainingProcessesRepository->index($params);      
   }
   public function getTrainingProcessesById($id){        
        return $this->trainingProcessesRepository->edit($id);      
   }
   public function getTrainingProcessesCreate(array $params){         
        return $this->trainingProcessesRepository->create($params);
   }
   public function getTrainingProcessesUpdate(array $params, $id){        
        return $this->trainingProcessesRepository->update($params, $id);
   }
   public function getTrainingProcessesDelete($id){   
        return $this->trainingProcessesRepository->delete($id);    
   }
}