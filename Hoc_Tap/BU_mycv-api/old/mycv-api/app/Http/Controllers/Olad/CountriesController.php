<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Countries\CountriesInterface;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $countriesInterface;
    public function __construct(CountriesInterface $countriesInterface){
        $this->countriesInterface = $countriesInterface;
    }

    public function storeCountriesApi(){
        return $this->responseData($this->countriesInterface->storeCountriesApi());
    }
    public function index(Request $request)
    {     
        $params = $request -> all();
        return $this->responseData($this->countriesInterface->getCountriesList($params));
    }
    public function edit($id)
    {      
        return $this->responseData($this->countriesInterface->getCountriesById($id));
    }
    public function create(Request $request)
    {   
        $params = $request -> all();
        return $this->responseData($this->countriesInterface->getCountriesCreate($params));
    }

    public function update(Request $request, $id)
    {     
        $params = $request -> all();   
        return $this->responseData($this->countriesInterface->getCountriesUpdate( $params, $id));
    }
    
    public function delete($id)
    {   
        return $this->responseData($this->countriesInterface->getCountriesDelete($id));
    }
}
