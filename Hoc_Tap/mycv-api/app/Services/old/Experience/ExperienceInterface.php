<?php 

namespace App\Services\Experience;
use Illuminate\Http\Request;
interface ExperienceInterface
{    
    public function getExperienceList($params);
    public function getExperienceById($id);
    public function getExperienceCreate($params);
    public function getExperienceUpdate($params, $id);
    public function getExperienceDelete($id);
}
