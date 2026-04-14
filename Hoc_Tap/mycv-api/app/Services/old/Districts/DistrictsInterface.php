<?php 

namespace App\Services\Districts;
use Illuminate\Http\Request;
interface DistrictsInterface
{    
    public function getDistrictsList($params);
    public function getDistrictsById($id);
    public function getDistrictsCreate($params);
    public function getDistrictsUpdate($params, $id);
    public function getDistrictsDelete($id);
    public function getStoreDistrictsApi();
}