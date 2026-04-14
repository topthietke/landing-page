<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Wards\WardsInterface;
use Illuminate\Http\Request;

class WardsController extends Controller
{
    private $wardsInterface;
    public function __construct(WardsInterface $wardsInterface){
        $this->wardsInterface = $wardsInterface;
    }        
    public function index(Request $request)
    {        
        return $this->responseData($this->wardsInterface->getWardsList($request));
    }

    public function edit($id)
    {        
        return $this->responseData($this->wardsInterface->getWardsById($id));
    }

    public function create(Request $request)
    {        
        return $this->responseData($this->wardsInterface->getWardsCreate($request));
    }
   
    public function update(Request $request,$id)
    {       
       return $this->responseData($this->wardsInterface->getWardsUpdate($request,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->wardsInterface->getWardsDelete($id));
    }
    public function storeWardsApi(){
        return $this->responseData( $this->wardsInterface->getStoreWardsApi());
    }
}
