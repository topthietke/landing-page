<?php 

namespace App\Services\CategoriesDetails;
use Illuminate\Http\Request;
interface CategoriesDetailsInterface
{    
    public function getCategoriesDetailsList($params);
    public function getCategoriesDetailsById($id);
    public function getCategoriesDetailsCreate($params);
    public function getCategoriesDetailsUpdate($params, $id);
    public function getCategoriesDetailsDelete($id);
}