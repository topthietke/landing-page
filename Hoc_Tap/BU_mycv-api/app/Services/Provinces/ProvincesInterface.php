<?php 

namespace App\Services\Provinces;
use Illuminate\Http\Request;
interface ProvincesInterface
{    
    public function getApiDataList();
    public function getProvincesList($params);
    public function getProvincesById($id);
    public function getProvincesCreate($params);
    public function getProvincesUpdate($params, $id);
    public function getProvincesDelete($id);
}