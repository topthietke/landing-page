<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Activities\ActivitiesInterface;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    protected $activitiesInterfaces;
    public function __construct(ActivitiesInterface $activitiesInterfaces)
    {        
        $this->activitiesInterfaces = $activitiesInterfaces;
    }
    public function index(Request $request){        
        $params = $request -> all();        
        return $this->responseData($this->activitiesInterfaces->index($params));        
    }
    public function details($id){
        return $this->responseData($this->activitiesInterfaces->details($id));        
    }
    public function create(Request $request){        
        $params = $request -> all();        
        return $this->responseData($this->activitiesInterfaces->create($params));        
    }
}
