<?php 

namespace App\Services\Wards;
use Illuminate\Http\Request;
interface WardsInterface
{    
    public function getWardsList(Request $request);
    public function getWardsById($id);
    public function getWardsCreate(Request $request);
    public function getWardsUpdate(Request $request, $id);
    public function getWardsDelete($id);
    public function getStoreWardsApi();
}