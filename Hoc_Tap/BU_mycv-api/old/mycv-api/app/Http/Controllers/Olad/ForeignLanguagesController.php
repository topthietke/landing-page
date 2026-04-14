<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ForeignLanguages\ForeignLanguagesInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ForeignLanguagesController extends Controller
{
    private $foreignLanguagesInterface;
    public function __construct(ForeignLanguagesInterface $foreignLanguagesInterface){
        $this->foreignLanguagesInterface = $foreignLanguagesInterface;
    }        
    public function index(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData( $this->foreignLanguagesInterface->getForeignLanguagesList($data));
    }

    public function edit($id)
    {        
        return $this->responseData( $this->foreignLanguagesInterface->getForeignLanguagesById($id));
    }

    public function create(Request $request)
    {        
        $data = $request -> all();
        return $this->responseData( $this->foreignLanguagesInterface->getForeignLanguagesCreate($data));
    }
   
    public function update(Request $request,$id)
    {       
        $data = $request -> all();
        return $this->responseData( $this->foreignLanguagesInterface->getForeignLanguagesUpdate($data,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData( $this->foreignLanguagesInterface->getForeignLanguagesDelete($id));
    }
}
