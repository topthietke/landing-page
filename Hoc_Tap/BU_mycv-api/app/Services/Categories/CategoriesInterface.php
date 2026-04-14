<?php 

namespace App\Services\Categories;
use Illuminate\Http\Request;
interface CategoriesInterface
{    
    public function getCategoriesList($params);
    public function getCategoriesById($id);
    public function getCategoriesCreate($params);
    public function getCategoriesUpdate($params, $id);
    public function getCategoriesDelete($id);
}