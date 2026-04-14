<?php 

namespace App\Services\Information;
use Illuminate\Http\Request;
interface InformationInterface
{    
    public function getInformationList($params);
    public function getInformationById($id);
    public function getInformationCreate($params);
    public function getInformationUpdate($params, $id);
    public function getInformationDelete($id);
}