<?php 

namespace App\Services\Skills;
use Illuminate\Http\Request;
interface SkillsInterface
{    
    public function getSkillsList($params);
    public function getSkillsById($id);
    public function getSkillsCreate($params);
    public function getSkillsUpdate($params, $id);
    public function getSkillsDelete($id);
}