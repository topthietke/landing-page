<?php

namespace App\Services\Languages;
use Illuminate\Http\Request;
interface LanguageInterface
{

    public function storeLanguageApi();
    public function getLanguageList($params);
    public function getLanguagesById($id);
    public function getLanguagesCreate($params);
    public function getLanguagesUpdate($params, $id);
    public function getLanguagesDelete($id);

}
