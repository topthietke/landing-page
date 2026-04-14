<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TranslateSystems\TranslateSystemsInterface;
use Illuminate\Http\Request;

class TranslateSystemsController extends Controller
{
    private $translateSystemsInterface;
    public function __construct(TranslateSystemsInterface $translateSystemsInterface){
        $this->translateSystemsInterface = $translateSystemsInterface;
    }        
    public function index(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->translateSystemsInterface->getTranslateSystemsList($data));
    }

    public function edit($id)
    {   
        return $this->responseData($this->translateSystemsInterface->getTranslateSystemsById($id));
    }

    public function create(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData($this->translateSystemsInterface->getTranslateSystemsCreate($data));
    }
   
    public function update(Request $request,$id)
    {       
        $data = $request -> all();
        return $this->responseData($this->translateSystemsInterface->getTranslateSystemsUpdate($data,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->translateSystemsInterface->getTranslateSystemsDelete($id));
    }
}
