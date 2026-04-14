<?php 

namespace App\Services\InformationTechnologyMajors;
use Illuminate\Http\Request;
interface InformationTechnologyMajorsInterface
{    
    public function getITechnologyList($params);
    public function getITechnologyById($id);
    public function getITechnologyCreate($params);
    public function getITechnologyUpdate($params, $id);
    public function getITechnologyDelete($id);
}