<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CareerGoals\CareerGoalsInterface;
use Illuminate\Http\Request;

class CareerGoalsController extends Controller
{
    private $careerGoalsInterface;
    public function __construct(CareerGoalsInterface $careerGoalsInterface){
        $this->careerGoalsInterface = $careerGoalsInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {        
        $params = $request -> all();   
        return $this->responseData($this->careerGoalsInterface->getCareerGoalsList($params));
    }

    public function edit($id)
    {    
        return $this->responseData($this->careerGoalsInterface->getCareerGoalsById($id));
    }

    public function create(Request $request)
    {   
        $params = $request -> all();
        return $this->responseData($this->careerGoalsInterface->getCareerGoalsCreate($params));
    }

    public function update(Request $request,$id)
    {       
       $params = $request -> all();   
       return $this->responseData($this->careerGoalsInterface->getCareerGoalsUpdate($params,$id));
    }

  
    public function delete($id)
    {
        return $this->responseData($this->careerGoalsInterface->getCareerGoalsDelete($id));
    }
}
