<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Experience\ExperienceInterface;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    private $experienceInterface;
    public function __construct(ExperienceInterface $experienceInterface){
        $this->experienceInterface = $experienceInterface;
    }        
    public function index(Request $request)
    {        
        $params = $request -> all();
        return $this->responseData($this->experienceInterface->getExperienceList($params));
    }

    public function edit($id)
    {        
        return $this->responseData($this->experienceInterface->getExperienceById($id));
    }

    public function create(Request $request)
    {   
        $params = $request -> all();
        return $this->responseData($this->experienceInterface->getExperienceCreate($params));
    }
   
    public function update(Request $request,$id)
    {       
        $params = $request -> all();
       return $this->responseData($this->experienceInterface->getExperienceUpdate($params,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->experienceInterface->getExperienceDelete($id));
    }
}
