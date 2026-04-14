<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DesiredJobs\DesiredJobsInterface;
class DesiredJobsController extends Controller
{
    
    private $desiredJobsInterface;
    public function __construct(DesiredJobsInterface $desiredJobsInterface){
        $this->desiredJobsInterface = $desiredJobsInterface;
    }        
    public function index(Request $request)
    {        
        $data = $request->all();
        return $this->responseData($this->desiredJobsInterface->getDesiredJobsList($data));
    }

    public function edit($id)
    {        
        return $this->responseData($this->desiredJobsInterface->getDesiredJobsById($id));
    }

    public function create(Request $request)
    {        
        $data = $request->all();
        return $this->responseData($this->desiredJobsInterface->getDesiredJobsCreate($data));
    }
   
    public function update(Request $request,$id)
    {       
        $data = $request->all();
        return $this->responseData($this->desiredJobsInterface->getDesiredJobsUpdate($data,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->desiredJobsInterface->getDesiredJobsDelete($id));
    }
}
