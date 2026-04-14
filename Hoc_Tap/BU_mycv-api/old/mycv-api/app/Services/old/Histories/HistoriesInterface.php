<?php 

namespace App\Services\Histories;
use Illuminate\Http\Request;
interface HistoriesInterface
{    
    public function getHistoriesList($params);
    public function getHistoriesById($id);
    public function getHistoriesCreate($params);
    public function getHistoriesUpdate($params, $id);
    public function getHistoriesDelete($id);
}