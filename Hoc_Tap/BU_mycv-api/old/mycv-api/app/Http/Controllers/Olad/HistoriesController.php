<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Histories\HistoriesInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HistoriesController extends Controller
{
    private $historiesInterface;
    public function __construct(HistoriesInterface $historiesInterface){
        $this->historiesInterface = $historiesInterface;
    }        
    public function index(Request $request)
    {        
        $params = $request -> all();
        return $this->responseData($this->historiesInterface->getHistoriesList($params));
    }

    public function edit($id)
    {        
        return $this->responseData($this->historiesInterface->getHistoriesById($id));
    }

    public function create(Request $request)
    {        
        $params = $request -> all();
        return $this->responseData($this->historiesInterface->getHistoriesCreate($params));
    }
   
    public function update(Request $request,$id)
    {       
        $params = $request -> all();
       return $this->responseData($this->historiesInterface->getHistoriesUpdate($params,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        return $this->responseData($this->historiesInterface->getHistoriesDelete($id));
    }
}
