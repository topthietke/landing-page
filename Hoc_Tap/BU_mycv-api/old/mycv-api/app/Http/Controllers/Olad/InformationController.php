<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Information\InformationInterface;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    private $informationInterface;
    public function __construct(InformationInterface $informationInterface){
        $this->informationInterface = $informationInterface;
    }        
    public function index(Request $request)
    {        
        $data = $request->all();
        return $this->responseData( $this->informationInterface->getInformationList($data));
    }

    public function edit($id)
    {        
        return $this->responseData( $this->informationInterface->getInformationById($id));
    }

    public function create(Request $request)
    {   
        $data = $request -> all();
        return $this->responseData( $this->informationInterface->getInformationCreate($data));
    }
   
    public function update(Request $request,$id)
    {      
       $data = $request -> all(); 
       return $this->responseData($this->informationInterface->getInformationUpdate($data,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->informationInterface->getInformationDelete($id));
    }
    
}
