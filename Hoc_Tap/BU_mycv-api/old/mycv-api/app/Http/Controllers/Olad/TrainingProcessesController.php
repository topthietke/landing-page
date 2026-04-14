<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TrainingProcesses\TrainingProcessesInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrainingProcessesController extends Controller
{
    private $trainingInterface;
    public function __construct(TrainingProcessesInterface $trainingInterface){
        $this->trainingInterface = $trainingInterface;
    }        
    public function index(Request $request)
    {        

        $params = $request -> all();
        return $this->responseData($this->trainingInterface->getTrainingProcessesList($params));
    }

    public function edit($id)
    {   
        return $this->responseData($this->trainingInterface->getTrainingProcessesById($id));
    }

    public function create(Request $request)
    {        
        $params = $request -> all();
        return $this->responseData($this->trainingInterface->getTrainingProcessesCreate($params));
    }
   
    public function update(Request $request,$id)
    {       
       $params = $request -> all();
       return $this->responseData($this->trainingInterface->getTrainingProcessesUpdate($params,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->trainingInterface->getTrainingProcessesDelete($id));
    }
}
