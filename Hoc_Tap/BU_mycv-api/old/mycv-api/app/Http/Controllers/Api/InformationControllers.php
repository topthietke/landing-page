<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Information\InformationService;
use Illuminate\Http\Request;

class InformationControllers extends Controller
{
    protected $informationService;
    public function __construct(InformationService $informationService) {
        $this->informationService = $informationService;        
    }

    // Danh sách thông tin cá nhân
    public function index(Request $request){                
        return $this->informationService->getInformationList($request->all());        
    }

    public function show(string $id){
        return $this->informationService->getInformationById($id);        
    }

    public function create() {       
        return $this->informationService->getInformationCreate($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Logic để xác thực và lưu một 'information' mới
    }
  
    public function update(Request $request, string $id)
    {
        // Logic để xác thực và cập nhật một 'information' cụ thể
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        // Logic để xóa một 'information' cụ thể
    }
}
