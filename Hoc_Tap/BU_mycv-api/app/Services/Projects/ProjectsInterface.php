<?php 

namespace App\Services\Projects;
use Illuminate\Http\Request;
interface ProjectsInterface
{    
    public function getProjectsList($params);
    public function getProjectsById($id);
    public function getProjectsCreate($params);
    public function getProjectsUpdate($params, $id);
    public function getProjectsDelete($id);
}