<?php

namespace App\Services\Projects;

use App\Models\Admin\Projects;
use Illuminate\Http\Request;
use App\Repositories\ProjectsRepository;
use App\Services\Projects\ProjectsInterface;

/**
 * Class UserService
 *
 * @package App\Services
 */
class ProjectsService implements ProjectsInterface
{
    protected $ProjectsRepository;
    public function __construct(ProjectsRepository $ProjectsRepository)
   {
       $this->ProjectsRepository = $ProjectsRepository;
   }
   public function getProjectsList($params){        
        return $this->ProjectsRepository->index($params);         
   }
   public function getProjectsById($id){        
        return $this->ProjectsRepository->edit($id);       
   }
   public function getProjectsCreate($params){ 
        
        return $this->ProjectsRepository->create($params);
        
   }
   public function getProjectsUpdate($params, $id){            
        return $this->ProjectsRepository->update($params, $id);        
   }
   public function getProjectsDelete($id){    
        return $this->ProjectsRepository->delete($id);  
   }
}