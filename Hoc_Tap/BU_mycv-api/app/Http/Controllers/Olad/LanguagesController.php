<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Languages\LanguageInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $languageInterface;
    public function __construct(LanguageInterface $languageInterface){
        $this->languageInterface = $languageInterface;
    }
    public function storeLanguageApi(){
        return $this->responseData($this->languageInterface->storeLanguageApi());
    }
    public function index(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->languageInterface->getLanguageList($data));
    }
    public function edit($id)
    {        
        return $this->responseData($this->languageInterface->getLanguagesById($id));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request -> all();
        return $this->responseData($this->languageInterface->getLanguagesCreate($data));
    }    
      /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request -> all();
        return $this->responseData($this->languageInterface->getLanguagesUpdate($data, $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->languageInterface->getLanguagesDelete($id));
    }
}
