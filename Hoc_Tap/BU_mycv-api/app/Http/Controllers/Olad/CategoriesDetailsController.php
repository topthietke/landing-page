<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoriesDetails\CategoriesDetailsInterface;
use Illuminate\Http\Request;

class CategoriesDetailsController extends Controller
{
    private $categoriesDetailsInterface;
    public function __construct(CategoriesDetailsInterface $categoriesDetailsInterface){
        $this->categoriesDetailsInterface = $categoriesDetailsInterface;
    }   
     
    public function index(Request $request)
    {   
        $params = $request -> all();     
        return $this->responseData($this->categoriesDetailsInterface->getCategoriesDetailsList($params));
    }

    public function edit($id)
    {        
        return $this->responseData($this->categoriesDetailsInterface->getCategoriesDetailsById($id));
    }

    public function create(Request $request)
    {        
        $params = $request -> all();
        return $this->responseData($this->categoriesDetailsInterface->getCategoriesDetailsCreate($params));
    }
   
    public function update(Request $request,$id)
    {     
        $params = $request -> all();  
       return $this->responseData($this->categoriesDetailsInterface->getCategoriesDetailsUpdate($params,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->categoriesDetailsInterface->getCategoriesDetailsDelete($id));
    }
}
