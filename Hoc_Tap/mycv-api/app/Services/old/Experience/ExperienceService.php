<?php

namespace App\Services\Experience;
use Illuminate\Http\Request;
use App\Repositories\ExperienceRepository;
use App\Services\Experience\ExperienceInterface;

/**
 * Class UserService
 *
 * @package App\Services
 */
class ExperienceService implements ExperienceInterface
{
    protected $experienceRepository;
    public function __construct(ExperienceRepository $experienceRepository)
   {
       $this->experienceRepository = $experienceRepository;
   }
   public function getExperienceList($params){        
        $data = $this->experienceRepository->index($params);
        return $data;
   }
   public function getExperienceById($id){        
        $data = $this->experienceRepository->edit($id);
        return $data;
   }
   public function getExperienceCreate($params){           
        $data = $this->experienceRepository->create($params);
        return $data;
   }
   public function getExperienceUpdate($params, $id){         
        $data = $this->experienceRepository->update($params, $id);
        return $data;
   }
   public function getExperienceDelete($id){           
        $data = $this->experienceRepository->delete($id);
        return $data;
   }
}