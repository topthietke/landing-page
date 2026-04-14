<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Activities\ActivitiesInterface;
use App\Services\Provinces\ProvincesInterface;
use Illuminate\Http\Request;


class ProvincesController extends Controller
{
    protected $provinceService;
    public function __construct(ProvincesInterface $provinceService){        
        $this->provinceService = $provinceService;
    }     
    public function apiDataList(){       
        return $this->responseData($this->provinceService->getApiDataList()); 
    }
    public function index(Request $request)
    {                
        $data = $request -> all();
        return $this->responseData($this->provinceService->getProvincesList($data)); 
    }

    public function edit($id)
    {        
        return $this->responseData($this->provinceService->getProvincesById($id)); 
    }

    public function create(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->provinceService->getProvincesCreate($data)); 
    }
   
    public function update(Request $request,$id)
    {       
        $data = $request -> all();
       return $this->responseData($this->provinceService->getProvincesUpdate($data,$id)); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->provinceService->getProvincesDelete($id)); 
    }

}
