<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Skills\SkillsInterface;
use Illuminate\Http\Request;


class SkillsController extends Controller
{
    private $skillsInterface;
    public function __construct(SkillsInterface $skillsInterface){
        $this->skillsInterface = $skillsInterface;
    }        
    public function index(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->skillsInterface->getSkillsList($data));
    }

    public function edit($id)
    {        
        return $this->responseData($this->skillsInterface->getSkillsById($id));
    }

    public function create(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->skillsInterface->getSkillsCreate($data));
    }
   
    public function update(Request $request,$id)
    {       
        $data = $request -> all();
       return $this->responseData($this->skillsInterface->getSkillsUpdate($data,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->skillsInterface->getSkillsDelete($id));
    }
}
