<?php

namespace App\Services\Skills;
use App\Repositories\SkillsRepository;
use App\Services\Skills\SkillsInterface;

/**
 * Class UserService
 *
 * @package App\Services
 */
class SkillsService implements SkillsInterface
{
    protected $skillsRepository;
    public function __construct(SkillsRepository $skillsRepository)
   {
       $this->skillsRepository = $skillsRepository;
   }
   public function getSkillsList($params){        
        return $this->skillsRepository->index($params);
        
   }
   public function getSkillsById($id){        
        return $this->skillsRepository->edit($id);        
   }
   public function getSkillsCreate($params){         
        return $this->skillsRepository->create($params);
   }
   public function getSkillsUpdate($params, $id){        
        return $this->skillsRepository->update($params, $id);   
   }
   public function getSkillsDelete($id){       
        return $this->skillsRepository->delete($id);    
   }
}