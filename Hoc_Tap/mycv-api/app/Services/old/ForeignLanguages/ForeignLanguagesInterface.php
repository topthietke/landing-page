<?php 

namespace App\Services\ForeignLanguages;
use Illuminate\Http\Request;
interface ForeignLanguagesInterface
{    
    public function getForeignLanguagesList($params);
    public function getForeignLanguagesById($id);
    public function getForeignLanguagesCreate($params);
    public function getForeignLanguagesUpdate($params, $id);
    public function getForeignLanguagesDelete($id);
}