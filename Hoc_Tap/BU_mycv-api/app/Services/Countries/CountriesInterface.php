<?php

namespace App\Services\Countries;
use Illuminate\Http\Request;
interface CountriesInterface
{    
    public function storeCountriesApi();
    public function getCountriesList($params);
    public function getCountriesById($id);
    public function getCountriesCreate($params);
    public function getCountriesUpdate($params, $id);
    public function getCountriesDelete($id);

}
