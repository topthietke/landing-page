<?php

namespace App\Repositories;
use App\Models\Api\CategoriesDetails;
class CategoriesDetailsRepository
{

    private $categoriesDetails;

    public function __construct(CategoriesDetails $categoriesDetails)
    {
        $this->categoriesDetails = $categoriesDetails;
    }

    public function index($params)
    {
     
        try {
            $model =  $this->categoriesDetails->select('*')
                ->whereNull('deleted_at')
                ->where('status',  $this->categoriesDetails->Active());               

            if(!empty($params)) {
                $model = $model  -> where($params);
            }
            
            $model = $model -> get();    
                
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải chi tiết danh mục thành công',
                    'data' => $model
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Tải chi tiết danh mục không thành công' 
                ];
            }     
        } catch (\Exception $e) {
                $data = [
                    'code' => 202,
                    'message' => $e -> getMessage()
                ];
        } 
       
        return $data;
    }

    public function edit($id)
    {        
        try {
            $model =  $this->categoriesDetails->where('id',$id)->first();             
                
            if(!empty($model)){
                $data = [
                    'code' => 200,
                    'message' => 'Tải chi tiết danh mục thành công',
                    'data' => $model
                ];
            }
            else{
                $data = [
                    'code' => 201,
                    'message' => 'Tải chi tiết danh mục không thành công' 
                ];
            } 
        } catch (\Exception $e) {
            $data = [
                'code' => 202,
                'message' => 'Tải chi tiết danh mục không thành công' 
            ];
        }         
        return $data;
    }

    public function create($params)
    {  
        try {           
            $model = $this->categoriesDetails->where('information_id',$params['information_id'])
            ->where('categories_id',$params['categories_id'])
            ->first();
            if(empty($model)) {            
                $add = $this->categoriesDetails->insert($params);   
                if($add === true) {
                    $data = [
                        'code' => 200,
                        'message' => 'Thêm mới chi tiết danh mục thành công',
                    ];
                }
                else {
                    $data = [
                        'code' => 201,
                        'message' => 'Thêm mới chi tiết danh mục không thành công',
                    ];
                }
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Nội dung thêm mới đã tồn tại! Vui lòng điền nội dung khác'                
                ];
            }
        } catch (\Exception $e) {            
            $data = [
                'code' => 201,
                'message' => $e -> getMessage()
            ];
        }          
        return $data;
    }

    public function update($params, $id)
    {           
        try {
            $params['updated_by'] =  $this->categoriesDetails->UPDATED_BY();
            $model = $this->categoriesDetails->where('id', (int)$id)->first()->update($params);
            if($model === true) {
                $data = [
                    'code' => 200,
                    'message' => 'Cập nhật chi tiết danh mục thành công',
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Cập nhật chi tiết danh mục không thành công',
                ];
            }
        } catch (\Exception $e) {            
            $data = [
                'code' => 201,
                'message' => $e -> getMessage(),
            ];
        }                
        return $data;
    }
    public function delete($id)
    {       
        try {
            $model = $this->categoriesDetails->find($id)->update([
                'status' =>  $this->categoriesDetails->InActive(),
                'deleted_at' => date('Y-m-d H:i'),
                'deleted_by' =>  $this->categoriesDetails->DELETED_BY()
            ]); 
            if($model === true) {
                $data = [
                    'code' => 200,
                    'message' => 'Xóa bỏ chi tiết danh mục thành công',
                ];
            }
            else {
                $data = [
                    'code' => 201,
                    'message' => 'Xóa bỏ chi tiết danh mục không thành công',
                ];
            }           
        } catch (\Exception $e) {          
            return $e->getMessage();
        }
        return $data;
    }

}