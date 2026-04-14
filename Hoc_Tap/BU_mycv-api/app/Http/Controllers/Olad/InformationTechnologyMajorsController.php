<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\InformationTechnologyMajors\InformationTechnologyMajorsInterface;
use Illuminate\Http\Request;

class InformationTechnologyMajorsController extends Controller
{
    private $iTechInterface;
    public function __construct(InformationTechnologyMajorsInterface $iTechInterface){
        $this->iTechInterface = $iTechInterface;
    }        
    public function index(Request $request)
    {   
        $data = $request -> all();     
        return $this->iTechInterface->getITechnologyList($data);
    }

    public function edit($id)
    {        
        return $this->iTechInterface->getITechnologyById($id);
    }

    public function create(Request $request)
    {   
        $data = $request -> all();     
        return $this->iTechInterface->getITechnologyCreate($data);
    }
   
    public function update(Request $request,$id)
    {  
        $data = $request -> all();     
       return $this->iTechInterface->getITechnologyUpdate($data,$id);
    }    
    public function delete($id)
    {
        return $this->iTechInterface->getITechnologyDelete($id);
    }
}
