<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Provinces;
use App\Services\Districts\DistrictsInterface;
use Illuminate\Http\Request;
class DistrictsController extends Controller
{
    private $districtsInterface;
    public function __construct(DistrictsInterface $districtsInterface){
        $this->districtsInterface = $districtsInterface;
    }        
    public function index(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->districtsInterface->getDistrictsList($data));
    }

    public function edit($id)
    {        
        return $this->responseData($this->districtsInterface->getDistrictsById($id));
    }

    public function create(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->districtsInterface->getDistrictsCreate($data));
    }
   
    public function update(Request $request,$id)
    {       
        $data = $request -> all();
        return $this->responseData($this->districtsInterface->getDistrictsUpdate($data,$id));
    }

    public function delete($id)
    {
        return $this->responseData($this->districtsInterface->getDistrictsDelete($id));
    }
    public function storeDistrictsApi(){        
        return $this->responseData($this->districtsInterface->getStoreDistrictsApi());
    }

}
