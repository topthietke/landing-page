<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Categories\CategoriesInterface;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    private $categoriesInterface;
    public function __construct(CategoriesInterface $categoriesInterface){
        $this->categoriesInterface = $categoriesInterface;
    }        
    public function index(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->categoriesInterface->getCategoriesList($data));
    }

    public function edit($id)
    {   
        return $this->responseData($this->categoriesInterface->getCategoriesById($id));
    }

    public function create(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->categoriesInterface->getCategoriesCreate($data));
    }
   
    public function update(Request $request,$id)
    {       
        $data = $request -> all();
        return $this->responseData($this->categoriesInterface->getCategoriesUpdate($data,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {        
        return $this->responseData($this->categoriesInterface->getCategoriesDelete($id));
    }
}
