<?php 

namespace App\Services\TranslateSystems;
use Illuminate\Http\Request;
interface TranslateSystemsInterface
{    
    public function getTranslateSystemsList(array $params);
    public function getTranslateSystemsById($id);
    public function getTranslateSystemsCreate(array $params);
    public function getTranslateSystemsUpdate(array $params, $id);
    public function getTranslateSystemsDelete($id);
}