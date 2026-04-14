<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Projects\ProjectsInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectsController extends Controller
{
    private $projectsInterface;
    public function __construct(ProjectsInterface $projectsInterface){
        $this->projectsInterface = $projectsInterface;
    }        
    public function index(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->projectsInterface->getProjectsList($data));
    }

    public function edit($id)
    {        
        return $this->responseData($this->projectsInterface->getProjectsById($id));
    }

    public function create(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->projectsInterface->getProjectsCreate($data));
    }
   
    public function update(Request $request,$id)
    {       
        $data = $request -> all();
       return $this->responseData($this->projectsInterface->getProjectsUpdate($data,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->projectsInterface->getProjectsDelete($id));
    }
}
