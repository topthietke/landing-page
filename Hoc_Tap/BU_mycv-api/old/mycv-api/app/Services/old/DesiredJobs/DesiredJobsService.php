<?php

namespace App\Services\DesiredJobs;

use App\Repositories\DesiredJobsRepository;
use App\Services\DesiredJobs\DesiredJobsInterface;
use Illuminate\Http\Request;
/**
 * Class UserService$this->
 *
 * @package App\Services
 */
class DesiredJobsService implements DesiredJobsInterface
{
    protected $desiredJobsRepository;
    public function __construct(DesiredJobsRepository $desiredJobsRepository)
    {
        $this->desiredJobsRepository = $desiredJobsRepository;
    }
   public function getDesiredJobsList($params){        
        $data = $this->desiredJobsRepository->index($params);
        return $data;
   }
   public function getDesiredJobsById($id){        
        $data = $this->desiredJobsRepository->edit($id);
        return $data;
   }
   public function getDesiredJobsCreate($params){ 
        $data = $this->desiredJobsRepository->create($params);
        return $data;
   }
   public function getDesiredJobsUpdate($params, $id){             
        $data = $this->desiredJobsRepository->update($params, $id);
        return $data;
   }
   public function getDesiredJobsDelete($id){       
        $data = $this->desiredJobsRepository->delete($id);
        return $data;
   }
}